
## Reference 

[generate gitignore](https://www.toptal.com/developers/gitignore)

## Enabling Simple SASS Support in Project

```shell
npm i -D sass
```

This is the pattern I think is both simple and robust. There are definitely other patterns to enable sass in a project just as an fyi.

**package.json**
```json
"scrpits" {
  "sass:watch": "sass --watch src/assets/sass/_index.scss:public/stylesheets/styles.css",
  "sass": "sass src/assets/sass/_index.scss:public/stylesheets/styles.css",
}
```

The first script watches for changes in the sass folder and compiles it to the specified output. 