This plugin boilerplate is my variation of Devin Vinson WPPB (https://github.com/DevinVinson/WordPress-Plugin-Boilerplate).

I've made modifications to the original boilerplate to have something closer to my idea of OOP.

Here are the new features/modifications:

1. I eliminated the loader class. I found it totally useless and found that it didn't add any real value
2. I added version and plugin name constants. They should be constants rather than object properties
3. I 'namespaced' the plugin. I did it to make the coding more in line with modern standards. Namespacing allowed also to standardise the classes names by removing classes prefixes.
4. I've added a new version management. I must admit I'm very proud of it. When the plugin is in a dev environment the assets version (JS and CSS) is the asset file timestamp
5. I've added a class autoloader
