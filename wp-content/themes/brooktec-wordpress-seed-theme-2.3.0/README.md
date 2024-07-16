# Seed Theme

## Requirements

- node/npm. Node version to use is on `.nvmrc` file.
- composer

## Start with the theme

You **must** make the following changes before you start developing the theme:

- Change `Theme Name`, `Description` and `Text Domain`, with your theme configuration on `style.css`.
- Replace the value of `SEED_THEME_NAME` with your theme slug.
- Change name of defined vars on `inc/config/definitions.php` **on the whole theme** replacing `SEED` with your theme name.
  - For example, for the *foo* theme, the `SEED_THEME_NAME` will be renamed as `FOO_THEME_NAME`
- If you download this theme through a git repository, remove the `.git` folder

Basic configuration of the theme is on `config.toml` file. TOML is a minimal configuration file format that's easy to read due to obvious semantics. You can read the documentation for more info about the format on the [TOML site](https://toml.io).

This theme came with the following default packages:

- **Bootstrap**.
  - You can uninstall it with `npm uninstall bootstrap`. If you uninstall this package you **must** remove his configurations on `config.toml` file. Also, you need to remove all Bootstrap importations on `src/sass/main.scss` file.
- **Fontawesome**.
  - You can uninstall it with `npm uninstall @fortawesome/fontawesome-free`. If you uninstall this package you **must** remove his configurations on `config.toml` file. Also, you need to remove all Fontawasome importations on `src/sass/main.scss` file.

You can add more sass, css, js and fonts from external package in the same way as the default installed packages.

## Local development

- Copy `.env.sample` and rename it as `.env`.
  - Set `NODE_ENV` with `development` value.
  - Modify the value of  `DEVELOPMENT_URL` var with the site url of your WordPress.
  - If you need to use a specific PHP version, configure the `PHP_EXECUTABLE` environment var.
  - If you need to use a specific composer version, configure the `PHP_COMPOSER_EXECUTABLE` environment var.
  - If you need to change the memory limit for PHP tests, configure the `PHP_MEMORY_LIMIT` environment var.
- Execute the following command:

  ```sh
  npm ci
  ```

- To develop with the theme you only need to launch the following task.

  ```sh
  npm start
  ```

  Or you can just build the theme with each change:

  ```sh
  npm run build
  ```

## Tests

To configure the active test you can change the configuration on the `config.toml` file:

```toml
[phptests]
phpstan = true
phpcs = true
phpmd = true
```

All tests are enabled by default.

To execute test you can use the following comand:

```sh
npm run test
```

Alternativally you can execute each test separately:

```sh
npm run phpstan
npm run phpcs
npm run phpmd
```

## Deployment

- Copy `.env.sample` and rename it as `.env`.
  - Set `NODE_ENV` with `development` or `production` value.
  - If you need to use a specific PHP version, configure the `PHP_EXECUTABLE` environment var.
  - If you need to use a specific composer version, configure the `PHP_COMPOSER_EXECUTABLE` environment var.
  - If you need to change the memory limit for PHP tests, configure the `PHP_MEMORY_LIMIT` environment var.
- Execute the following command:

  ```sh
  npm ci
  ```

- Run the test:

  ```sh
  npm run test
  ```

- You need to build the theme:

  ```sh
  npm run build
  ```

- Then, the last step is to clean theme for production:

  ```sh
  npm run clean
  ```

  Once executed the theme can not be rebuild. This command removes the following files/folders:
  - `node_modules` folder
  - `src` folder
  - `.editorconfig` file
  - `.env` file
  - `.env.sample` file
  - `.gitignore` file
  - `.nvmrc` file
  - `.sass-lint.yml` file
  - `CHANGELOG.md` file
  - `composer.json` file
  - `composer.lock` file
  - `config.toml` file
  - `gulpfile.mjs` file
  - `package-lock.json` file
  - `package.json` file
  - `phpcs.ruleset.xml` file
  - `phpstan.neon` file
  - `README.md` file
