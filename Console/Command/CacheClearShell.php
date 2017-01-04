<?php
class CacheClearShell extends AppShell {

    function main()
    {
    	// $this->out("Hello");
        $config_list = Cache::configured();
        foreach ($config_list as $value)
        {
            Cache::clear(false, $value);
        }
        clearCache();
    }
}
