<?php

namespace App\Services;

use File;
use ZipArchive;
use App\Models\Step;
use App\Models\Task;
use App\Models\Expert;
use GuzzleHttp\Client;
use App\Models\ExpertData;
use App\Helpers\TaskDeadline;

class TaskService
{
    public static function changeNextStep($id)
    {
        $step = Step::query()
            ->where('id', ($id + 1))
            ->first();

        return !empty($step) ? $step : null;
    }

    public static function checkExpertCount($step_id, $task_id): bool
    {
        $experts = Expert::query()
            ->where('step_id', $step_id)
            ->count();

        $step = ExpertData::query()
            ->where('task_id', $task_id)
            ->where('step_id', $step_id)
            ->where('result', 2)
            ->count();

        return ($experts == $step);
    }

    public static function checkExpertDataResult($step_id, $task_id, $result_date)
    {
        $obj = new TaskDeadline();
        $task = Task::query()->find($task_id);
        $experts = Expert::query()
            ->where('step_id', $step_id)
            ->get();
        $expertDeadlineDay = Expert::query()
            ->where('step_id', $step_id)
            ->first();

        foreach ($experts as $expert) {
            ExpertData::query()->create([
                'expert_id' => $expert->id,
                'step_id' => $expert->step_id,
                'task_id' => $task->id,
                'phone' => $expert->userRoleLink->userData->mob_phone_no,
                'authority_id' => $expert->authority_id,
                "deadline_start" => $result_date,
                "deadline_end" => $obj->getDeadlineForTask($result_date, $expertDeadlineDay->days),
                "deadline_days" => $expertDeadlineDay->days,
            ]);
        }
    }

    public static function zipOneFile($type)
    {
        $zip = new ZipArchive();
        $filename = 'download.zip';

        if ($zip->open($filename, ZipArchive::CREATE) == TRUE) {
            $zip->addFile(public_path("storage/$type"), basename($type));
            $zip->close();
        }
        return response()->download(public_path($filename))->deleteFileAfterSend(true);
    }

    public static function zipManyFiles($type)
    {
        $zip = new ZipArchive;
        $fileName = 'download.zip';

        if ($zip->open(public_path($fileName), ZipArchive::CREATE) === TRUE) {
            $files = File::files(public_path("storage/$type"));

            foreach ($files as $value) {
                $relativeNameInZipFile = basename($value);
                $zip->addFile($value, $relativeNameInZipFile);
            }

            $zip->close();
        }
        return response()->download(public_path($fileName))->deleteFileAfterSend(true);
    }

    private static function folderToZip($folder, &$zipFile, $exclusiveLength)
    {
        $handle = opendir($folder);
        while (false !== $f = readdir($handle)) {
            if ($f != '.' && $f != '..') {
                $filePath = "$folder/$f";
                // Remove prefix from file path before add to zip.
                $localPath = substr($filePath, $exclusiveLength);
                if (is_file($filePath)) {
                    $zipFile->addFile($filePath, $localPath);
                } elseif (is_dir($filePath)) {
                    // Add sub-directory.
                    $zipFile->addEmptyDir($localPath);
                    self::folderToZip($filePath, $zipFile, $exclusiveLength);
                }
            }
        }
        closedir($handle);
    }

    public static function zipDir($sourcePath, $outZipPath)
    {
        $pathInfo = pathInfo($sourcePath);
        $parentPath = $pathInfo['dirname'];
        $dirName = $pathInfo['basename'];

        $z = new ZipArchive();
        $z->open($outZipPath, ZIPARCHIVE::CREATE);
        $z->addEmptyDir($dirName);
        self::folderToZip($sourcePath, $z, strlen("$parentPath/"));
        $z->close();
    }

    public static function fileUpload($request, $task, $column)
    {
        $path = "applications/$task->id" . '/' . "Аризачи файли/";
        if ($request->hasfile($column)) {
            $file = $request->file($column);
            $extension = $file->getClientOriginalExtension();
            $filename = uniqid('') . '.' . $extension;
            $file->storeAs($path, $filename, 'public');
            return $path . $filename;
        }
    }

    /**
     * @param $signature
     * @return false|\Illuminate\Http\JsonResponse|string
     * @throws \GuzzleHttp\Exception\GuzzleException
     */
    public static function is_signature($signature)
    {
        # формирование тела SOAP XML запроса отправляемого на сервер
        $soap = "
        <Envelope xmlns=\"http://schemas.xmlsoap.org/soap/envelope/\">
            <Body>
                <verifyPkcs7 xmlns=\"http://v1.pkcs7.plugin.server.dsv.eimzo.yt.uz/\">
                    <pkcs7B64 xmlns=\"\">$signature</pkcs7B64>
                </verifyPkcs7>
            </Body>
        </Envelope>";

        # создаём объект GuzzleHttp (аналог curl)
        $http = new Client;

        # адрес на который мы будем обращаться
        $url = "http://91.212.89.112:9090/dsvs/pkcs7/v1?wsdl";

        # сам пост запрос, на удаленный сервер
        $response = $http->post($url, [
            'headers' => [
                'Content-type' => 'text/xml; charset=utf-8',
            ],
            'body' => $soap,
            'http_errors' => false,
            'verify' => false,
        ]);

        # получаем данные из тела ответа
        $result = $response->getBody()->getContents();

        # регулярка, на то чтобы вытащить наш ответ из SOAP дарованного папуасами
        preg_match("/<return>(.*)<\/return>/Uis", $result, $matches);

        # ничего не пришло в ответе, значит либо сервер нам ничего не отослал, либо попути произошла ошибка при передачи информации
        if ($matches[0] === '<return></return>') {
            return response()->json([
                'message' => 'Verification server return no data'
            ], 400);
        } else {
            # парсинг входящих данных
            $xml = simplexml_load_string($matches[0]);
            $answer = json_decode(json_encode((array)$xml), true);
            $array = $answer = (array)json_decode($answer[0], true);
            $answer = json_encode($answer, JSON_UNESCAPED_UNICODE);
            $array = explode(',', $array['pkcs7Info']['signers'][0]['certificate'][0]['issuerName']);
            foreach ($array as $one) {
                if ($one == 'O=DUK YANGI TEXNOLOGIYALAR ILMIY-AXBOROT MARKAZI') {
                    return $answer;
                }
            }
            return false;


            //            dd($array['pkcs7Info']['signers'][0]['certificate'][0]['issuerName']);

            //            dd(explode(',', $array['pkcs7Info']['signers'][0]['certificate'][0]['issuerName']));

            //            if (isset($answer['className'], $answer['reason'], $answer['success'])) {
            //                if ($answer['className'] === 'CMSException' && $answer['reason'] === 'IOException reading content.' && $answer['success'] === false) {
            //                    return false;
            //                }
            //
            //                if ($answer['className'] === 'DecoderException' && $answer['reason'] === 'unable to decode base64 string: invalid characters encountered in base64 data' && $answer['success'] === false) {
            //                    return false;
            //                }
            //            }
            //
            //            if (isset($answer['pkcs7Info']['signers']['0'], $answer['pkcs7Info']['documentBase64'])) {
            //                $cert = $answer['pkcs7Info']['signers']['0'];
            //            } else {
            //                return false;
            //            }

            # проверка валидации сертификата (Хитрожопая система проверки умножением. Данные поля могут иметь значения только true или false );
            //            $verification = $cert['verified'] * $cert['certificateVerified'] * $cert['certificateValidAtSigningTime'];


            //            if ($verification == true) {
            //                return true;
            //            } else {
            //                return false;
            //            }
        }
    }

    public static function signature_data($signature)
    {
        # формирование тела SOAP XML запроса отправляемого на сервер
        $soap = "
        <Envelope xmlns=\"http://schemas.xmlsoap.org/soap/envelope/\">
            <Body>
                <verifyPkcs7 xmlns=\"http://v1.pkcs7.plugin.server.dsv.eimzo.yt.uz/\">
                    <pkcs7B64 xmlns=\"\">$signature</pkcs7B64>
                </verifyPkcs7>
            </Body>
        </Envelope>";

        # создаём объект GuzzleHttp (аналог curl)
        $http = new Client;

        # адрес на который мы будем обращаться

        $url = 'http://91.212.89.112:9090/dsvs/pkcs7/v1?wsdl';

        # сам пост запрос, на удаленный сервер
        $response = $http->post($url, [
            'headers' => [
                'Content-type' => 'text/xml; charset=utf-8',
            ],
            'body' => $soap,
            'http_errors' => false,
            'verify' => false,
        ]);

        # получаем данные из тела овета
        $result = $response->getBody()->getContents();

        # регулярка, на то чтобы вытащить наш ответ из SOAP дарованного папуасами
        preg_match("/<return>(.*)<\/return>/Uis", $result, $matches);

        # ничего не пришло в ответе, значит либо сервер нам ничего не отослал, либо попути произошла ошибка при передачи информации
        if ($matches[0] === '<return></return>') {
            return false;
        } else {
            # парсинг входящих данных
            $xml = simplexml_load_string($matches[0]);
            $answer = json_decode(json_encode((array)$xml), true);
            $answer = (array)json_decode($answer[0], true);
            $answer = json_decode(json_encode((array)$answer), true);

            if (isset($answer['className'], $answer['reason'], $answer['success'])) {
                if ($answer['className'] === 'CMSException' && $answer['reason'] === 'IOException reading content.' && $answer['success'] === false) {
                    return false;
                }

                if ($answer['className'] === 'DecoderException' && $answer['reason'] === 'unable to decode base64 string: invalid characters encountered in base64 data' && $answer['success'] === false) {
                    return false;
                }
            }

            if (isset($answer['pkcs7Info']['signers']['0'], $answer['pkcs7Info']['documentBase64'])) {
                $cert = $answer['pkcs7Info']['signers']['0'];
                $crypt_string = $answer['pkcs7Info']['documentBase64'];
                $crypt_dec_b64 = base64_decode($crypt_string);
            } else {
                return false;
            }

            /**
             * Для тех кто не знал:
             * true  * false === false;
             * false * false === false;
             * true  * true  === true;
             * грубо говоря , если хотя бы один аргументов умножения false результат примет значение false , что нам сопсна и надо
             */

            # проверка валидации сертификата (Хитрожопая система проверки умножением. Данные поля могут иметь значения только true или false );
            $verification = (int)$cert['verified'] * $cert['certificateVerified'] * $cert['certificateValidAtSigningTime'];

            if ($verification) {
                # запихиваем информацию о владельце ключа в переменную
                $key_info = $cert['certificate']['0']['subjectName'];

                /**
                 * $first_array = explode (',', $key_info);
                 * foreach ($first_array as $item) {
                 * $tmp_arr =  explode('=', $item);
                 * $key_info_arr[$tmp_arr['0']] = $tmp_arr['1'];
                 * }
                 */

                # вариант выше тоже работает, но этот укладывается в две строки (если вам не понятно как работает этот код, используете код выше)
                $key_chunks = array_chunk(preg_split('/(=|,)/', $key_info), 2);
                $key_info_arr = array_combine(array_column($key_chunks, 0), array_column($key_chunks, 1));

                # объявляем инкриментатор, и массив который мы будем запихивать данные
                $inc = 0;
                $key_inner = [];

                # преобразуем название колонок в массиве, не как папуасы которые нам их присылают
                foreach ($key_info_arr as $item_info) {

                    # приедем значение к верхнему регистру
                    $item_info = mb_strtoupper($item_info);

                    # в зависимости от номера элемента в переборе , присваиваем значение к нужному элементу массива
                    switch ($inc) {
                        case 0:
                            $key_inner['FULL_NAME'] = $item_info;
                        case 1:
                            $key_inner['NAME'] = $item_info;
                        case 2:
                            $key_inner['SURNAME'] = $item_info;
                        case 3:
                            $key_inner['ORGANIZATION'] = $item_info;
                        case 4:
                            $key_inner['AREA'] = $item_info;
                        case 5:
                            $key_inner['CITY'] = $item_info;
                        case 6:
                            $key_inner['COUNTRY'] = $item_info;
                        case 7:
                            $key_inner['PIN'] = $item_info;
                        case 8:
                            $key_inner['POSITION'] = $item_info;
                        case 9:
                            $key_inner['TIN'] = $item_info;
                        case 10:
                            $key_inner['TYPE'] = $item_info;
                    }
                    $inc++;
                }

                # очищаем инкрементатор
                unset($inc);

                # присваивем то что подпись верифицирована, на момент подписания / ключ валидный.
                $key_inner['SIGNATURE_VERIFIED'] = $verification;
                $key_inner['SIGNED_STRING'] = $crypt_dec_b64;

                return $key_inner;
            } else {
                return false;
            }
        }
    }
}
