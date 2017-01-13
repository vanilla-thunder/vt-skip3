var fs = require('fs'),
    p = require('./package.json'),
    replace = require('replace'),
    runner = require('child_process');


var shell = function (command) {
    runner.exec(command,
        function (err, stdout, stderr) {
            //if (err) console.log(err);
            //if (stderr) console.log(stderr);
        }
    );
};

// cleanup
shell("rm -rf _module/application");
shell("rm -rf _module/extend");
shell("rm -rf _master/copy_this/modules/vt/"+p.name);
console.log("");
console.log("     cleanup finished");

// copy files
shell("cp -r application _module/application");
shell("cp -r extend _module/extend");
shell("cp metadata.php _module/metadata.php");
shell("cp README.md _module/README.md");
shell("cp LICENSE _module/LICENSE");
console.log("     new files copied");

// compile some files
var replaces = {
    'NAME': p.name,
    'MODULE': p.description,
    'VERSION': p.version+' '+new Date().toLocaleDateString(),
    'AUTHOR': p.author,
    'COMPANY': p.company,
    'EMAIL': p.email,
    'URL': p.url,
    'YEAR': new Date().getFullYear()
};

for(var x in replaces)
{
    replace({
        regex: "___"+x+"___",
        replacement: replaces[x],
        paths: ['./_module'],
        recursive: true,
        silent: true
    });
}

process.on('exit', function (code) {
    console.log("     replacing complete");
    // copy module to master
    shell("cp -rf _module _master/copy_this/modules/vt/"+p.name);
    shell("rm -rf _master/copy_this/modules/vt/"+p.name+"/.git");
    shell("cp _module/README.md _master/README.md");
    console.log("");
    console.log("     build complete! made my day!");
    console.log("");
});