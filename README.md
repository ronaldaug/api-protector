# API Protector addon for Cockpit CMS

Rate Limit and Protect Scraping Content

[Download this repo](https://github.com/ronaldaug/api-protector/archive/refs/heads/main.zip), extract zip and put into `addons` folder of Cockpit CMS.


Play with the configs in [config.php](https://github.com/ronaldaug/api-protector/blob/main/config.php)


## Configs

- **limit** - number of connections to limit user to per minutes. Default value is `100` and it means it allows 100 calls per minute.
- **minutes** - number of  minutes to check for.
- **seconds** -	retry after minutes in seconds.
- **show_only** - protect scraping collection data, `0` will show all entries. 
By default, routing to `api/collections/entries/[mycollection]` will show all the entries, this is a kind of exposing the whole collection data. By setting `show_only` to `10`, it will show only `10` results per call.

----

Credit to
- [https://gist.github.com/freekrai](freekrai)
- [Session Based Rate Limitor Gist](https://gist.github.com/freekrai/cdcd6ebb29d84b9dc244282e64caf5fe)
