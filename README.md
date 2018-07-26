This plugin boilerplate is a fork of Devin Vinson WPPB (https://github.com/DevinVinson/WordPress-Plugin-Boilerplate).

I've made modifications to the original boilerplate to have something closer to my idea of OOP and take advantage of modern coding techniques.

Here are the new features/modifications:

1. The very first action of the plugin is to setup constants. All constants are setup automatically, name and version constants take their value from the plugin headers.
2. The boilerplate is 'namespaced'. I did it to make the coding more in line with modern standards. Namespacing allowed also to standardise the classes names by removing classes prefixes.
3. I've created a new version management mechanism. When the plugin is in a dev environment the asset file timestamp is used as asset version. This will avoid browser caching problems that are so bad during the development phase because every time the file is modified and saved the version changes.
4. I've added a class autoloader. The autoloader will load ONLY the classes of this plugin.

I believe that a boilerplate should constitute the basic foundation of a plugin. This boilerplate suggests best practices and can be ready to use in a few minutes with small modifications. No more prefixing of functions and classes names, no more worrying about including classes files.
