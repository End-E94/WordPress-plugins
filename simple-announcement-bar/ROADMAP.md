# Roadmap

Goal: A lightweight WordPress plugin that shows a dismissible announcement bar at the top of the site. The site owner sets the message, an optional link with label, and colors in a settings page under Settings. Visitors can dismiss the bar and it stays dismissed for them. No external services, no tracking, accessible markup, translatable, WordPress.org ready.

Each item is one small task that changes a single file. The roadmap bot ticks items off automatically. You can add your own tasks at any time: start each with Create, Add, Update or Improve and name the exact file path.

## Plugin scaffold
- [x] Create includes/modules/class-announce-bar-settings.php with a settings page under the Settings menu using the Settings API _(done by roadmap bot, 2026-11-15, built-in)_
- [x] Create includes/modules/class-announce-bar-links.php that adds a Settings link to the plugins list _(done by roadmap bot, 2026-11-15, built-in)_
- [x] Create includes/class-announce-bar-plugin.php that loads every module in includes/modules _(done by roadmap bot, 2026-11-15, built-in)_
- [x] Create simple-announcement-bar.php with the WordPress plugin header, constants and the module loader _(done by roadmap bot, 2026-11-15, built-in)_
- [x] Create uninstall.php that deletes the plugin settings _(done by roadmap bot, 2026-11-15, built-in)_

## WordPress.org readiness and coding standards
- [ ] Create readme.txt in the WordPress.org plugin readme format with description, installation, FAQ and changelog
- [ ] Create phpcs.xml.dist that uses the WordPress-Extra, WordPress-Docs and PHPCompatibilityWP rulesets with the plugin text domain and prefix
- [ ] Create composer.json with dev dependencies wp-coding-standards/wpcs and phpcompatibility/phpcompatibility-wp and lint and fix scripts
- [ ] Create languages/README.md explaining how to translate the plugin
- [ ] Create README.md with the plugin description, requirements, installation and development instructions
