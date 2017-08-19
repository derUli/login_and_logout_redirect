<?php

class LoginAndLogoutRedirect extends Controller
{

    private $moduleName = "login_and_logout_redirect";

    public function loginUrlFilter($url)
    {
        if (StringHelper::isNotNullOrWhitespace(Settings::get("login_redirect"))) {
            Request::redirect(Settings::get("login_redirect"));
        }
    }

    public function logoutUrlFilter($url)
    {
        if (StringHelper::isNotNullOrWhitespace(Settings::get("logout_redirect"))) {
            Request::redirect(Settings::get("logout_redirect"));
        }
    }

    public function settings()
    {
        if (Request::isPost()) {
            if (Request::hasVar("login_url")) {
                Settings::set("login_url", Request::getVar("login_url"));
            }
            if (Request::hasVar("logout_url")) {
                Settings::set("logout_url", Request::getVar("logout_url"));
            }
        }
        return Template::executeModuleTemplate($this->moduleName, "settings.php");
    }
}