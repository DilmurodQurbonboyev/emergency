<div class="imzo">
    <label id="message"></label>
    <input type="hidden" id="pfx" name="keyType" value="pfx">
    <label for="pfx">{{ tr('Edc Sign') }}</label>
    <div class="d-flex justify-content-between">
        <div class="one mr-3" style="flex: 1">
            <select name="key" class="form-control @error('sign_id') is-invalid @enderror"
                    onchange="cbChanged(this)"></select>
        </div>
        <div class="two">
            <button class="btn btn-success" onclick="sign()" type="button"
                    id="signButton">{{ tr('Signing') }}</button>
        </div>
    </div>

    <div class="alert alert-success alert-dismissible show fade d-none mt-3" role="alert"
         id="sign-show">
        <span>{{ tr('Successfully signed') }}</span>
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
        </button>
    </div>

    <div class="alert alert-danger alert-dismissible show fade d-none mt-3" role="alert"
         id="error-show">
        <span>{{ tr('Something went wrong') }}</span>
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span class="text-white" aria-hidden="true">&times;</span>
        </button>
    </div>

    <input type="hidden" name="sign_id" id="sign_id">
    <input type="hidden" name="sign_full_name" id="sign_full_name">
    <input type="hidden" name="sign_pin" id="sign_pin">

    <label for="idcard" class="d-none">ID-card</label>
    <label id="plugged" class="d-none">не подключена</label>
    <input type="hidden" name="data" value="12">
    <input type="hidden" name="pkcs7Type" value="attached">
    <label id="progress" class="d-none"></label>
    <label id="keyId" class="d-none"></label>
    <label id="pkcs7Type_label" class="d-none">Подписанный документ PKCS#7</label>
    <input name="pkcs7" type="hidden">
</div>
