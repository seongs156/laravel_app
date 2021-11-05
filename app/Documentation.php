<?php

namespace App;

use File;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

class Documentation
{
    public function get($file = 'README.md')
    {
        $content = File::get($this->path($file));

        return $this->replaceLinks($content);
    }

    protected function path($file)
    {
        $file = Str::endsWith($file, ['.md','.png']) ? $file : $file . '.md';
        $path = base_path('docs' . DIRECTORY_SEPARATOR . $file);

        $path_tmp = '/docs' . DIRECTORY_SEPARATOR . $file;

//        echo asset('storage'.$path_tmp);
        if(!asset('storage'.$path_tmp))
        {
            abort(404, '요청하신 파일이 없습니다.');
        }
        return $path;
    }

    protected function replaceLinks($content)
    {
        return str_replace('/docs/{{version}}', '/docs',$content);
    }

    public function etage($file)
    {
        $lastModified = File::lastModified($this->path($file,'docs/images'));

        return md5($file.$lastModified);
    }
}
