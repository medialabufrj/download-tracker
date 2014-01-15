download-tracker
==========

Pequeno sistema em PHP e htaccess para criar páginas de download de arquivo com Google Analytics integrado e timer (como alguns sites de download costumam fazer).

### Instalação

- copiar a pasta `/download` para o seu servidor php
- copiar os arquivos desejados para a pasta `/download/arquivos/`
- no arquivo `/download/index.php`, configurar as variáveis `$site_name` e `$analytics_id`
- acessar os arquivos pelo link `/download/nome-do-arquivo.ext`

```
Ex: www.seusite.com.br/download/exemplo.gif
```