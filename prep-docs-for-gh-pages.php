<?php

@mkdir('docs/css', 0777, true);
@mkdir('docs/js', 0777, true);
@mkdir('docs/images', 0777, true);

foreach(glob("public/docs/*.*") as $file) {
    print_r($file, str_replace("public/", "", $file)."\n");
    copy($file, str_replace("public/", "", $file));
}
foreach(glob("public/docs/*/*.*") as $file) {
    print_r($file, str_replace("public/", "", $file)."\n");
    copy($file, str_replace("public/", "", $file));
}

file_put_contents("docs/index.html", str_replace("../docs/", "", file_get_contents("docs/index.html")));
file_put_contents("docs/CNAME", "demo.scribe.knuckles.wtf");
echo "Copied docs for GH pages";