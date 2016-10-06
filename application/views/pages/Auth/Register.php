<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>
<div id="BoxPrimary">
    <div class="header">
        Inscription
    </div>
    <div class="contentain">
        <div class="container">
            <form id="register" class="register-form">
                <div class="form-group row">
                    <label for="InputUsername" class="col-sm-2 col-form-label">Nom de compte</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control" id="InputUsername" placeholder="Nom de compte">
                    </div>
                </div>
                <div class="form-group row">
                    <label for="InputEmail1" class="col-sm-2 col-form-label">Email</label>
                    <div class="col-sm-10">
                        <input type="email" class="form-control" id="InputEmail1" placeholder="Email">
                    </div>
                </div>
                <div class="form-group row">
                    <label for="InputEmail2" class="col-sm-2 col-form-label">Email (Vérification)</label>
                    <div class="col-sm-10">
                        <input type="email" class="form-control" id="InputEmail2" placeholder="Email (Vérification)">
                    </div>
                </div>
                <div class="form-group row">
                    <label for="InputPassword1" class="col-sm-2 col-form-label">Password</label>
                    <div class="col-sm-10">
                        <input type="password" class="form-control" id="InputPassword1" placeholder="Password">
                    </div>
                </div>
                <div class="form-group row">
                    <label for="InputPassword2" class="col-sm-2 col-form-label">Password (Vérification)</label>
                    <div class="col-sm-10">
                        <input type="password" class="form-control" id="InputPassword2" placeholder="Password (Vérification)">
                    </div>
                </div>
                <div class="form-group row">
                    <div class="offset-sm-2 col-sm-10">
                        <button type="submit" class="btn btn-primary">Sign in</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>