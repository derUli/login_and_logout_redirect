<?php

class LoginAndLogoutRedirect extends Controller
{

    private $moduleName = "login_and_logout_redirect";

    public function loginUrlFilter($url)
    {
        if (StringHelper::isNotNullOrWhitespace(Settings::get("login_redirect"))) {
            $url = Settings::get("login_redirect");
        }
        return $url;
    }

    public function logoutUrlFilter($url)
    {
        if (StringHelper::isNotNullOrWhitespace(Settings::get("logout_redirect"))) {
            $url = Settings::get("logout_redirect");
        }
        return $url;
    }

    public function getSettingsHeadline()
    {
        return get_translation("login_and_logout_redirect");
    }

    public function settings()
    {
        if (Request::isPost()) {
            if (Request::hasVar("login_redirect")) {
                Settings::set("login_redirect", Request::getVar("login_redirect"));
            }
            if (Request::hasVar("logout_redirect")) {
                Settings::set("logout_redirect", Request::getVar("logout_redirect"));
            }
        }
        return Template::executeModuleTemplate($this->moduleName, "settings.php");
    }
}