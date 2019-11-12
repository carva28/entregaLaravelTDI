---
title: API Reference

language_tabs:
- bash
- javascript

includes:

search: true

toc_footers:
- <a href='http://github.com/mpociot/documentarian'>Documentation Powered by Documentarian</a>
---
<!-- START_INFO -->
# Info

Welcome to the generated API reference.
[Get Postman Collection](http://localhost/docs/collection.json)

<!-- END_INFO -->

#API da Noticia


 APIs para gerir notícias e ver as respetivas secções  e jornais
<!-- START_3e0792dacbd9e7d214dcc50f52939226 -->
## Apresentação das notícias realizadas por grandes repórteres.

Interpretação de quem fez a notícia, para que jornal é, e qual a secção que se destina
HTTP Response

> Example request:

```bash
curl -X GET -G "http://localhost/api/noticia" \
    -H "Content-Type: application/json" \
    -d '{"200":6}'

```

```javascript
const url = new URL("http://localhost/api/noticia");

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
}

let body = {
    "200": 6
}

fetch(url, {
    method: "GET",
    headers: headers,
    body: body
})
    .then(response => response.json())
    .then(json => console.log(json));
```


> Example response (200):

```json
{
    "data": [
        {
            "id": 1,
            "titulo_noticia": "Reforma nos dias de hoje é válida?",
            "corpo_noticia": "Hoje em dia nao ha reforma porque somos roubados",
            "user_id": 1,
            "jornal_id": 1,
            "seccao_id": 3,
            "created_at": "2019-11-04 00:14:32",
            "updated_at": "2019-11-12 11:11:26",
            "deleted_at": null,
            "jornal": {
                "id": 1,
                "name_jornal": "Jornal da Escolas",
                "description": "Este Jornal pertence à escola EB2\/3 de Guimarãesssss",
                "user_id": 2,
                "created_at": "2019-11-04 00:13:08",
                "updated_at": "2019-11-09 21:53:25",
                "deleted_at": null
            },
            "seccao": {
                "id": 3,
                "nome_seccao": "Economia",
                "imagem_seccao": "images\/ySreEWJIstOLoNz0Y3a4z720PhTYDTAH8sFxCgrB.png",
                "created_at": "2019-11-04 12:16:38",
                "updated_at": "2019-11-04 15:51:53",
                "deleted_at": null
            },
            "user": {
                "id": 1,
                "name": "Administrator",
                "username": "admintdi",
                "email": "admin@tdi.pt",
                "email_verified_at": null,
                "role_id": 1,
                "created_at": "2019-11-03 23:58:30",
                "updated_at": "2019-11-03 23:58:30",
                "deleted_at": null
            }
        },
        {
            "id": 2,
            "titulo_noticia": "Os golfinhos no Tejo",
            "corpo_noticia": "Golfinhos no tejo são lindos",
            "user_id": 7,
            "jornal_id": 1,
            "seccao_id": 1,
            "created_at": "2019-11-04 11:24:57",
            "updated_at": "2019-11-04 11:24:57",
            "deleted_at": null,
            "jornal": {
                "id": 1,
                "name_jornal": "Jornal da Escolas",
                "description": "Este Jornal pertence à escola EB2\/3 de Guimarãesssss",
                "user_id": 2,
                "created_at": "2019-11-04 00:13:08",
                "updated_at": "2019-11-09 21:53:25",
                "deleted_at": null
            },
            "seccao": {
                "id": 1,
                "nome_seccao": "Cultura",
                "imagem_seccao": "images\/HAWX8OG1L1647PTuP9kU5FVh8xTGGT8WaO1vXhfx.png",
                "created_at": "2019-11-04 00:02:07",
                "updated_at": "2019-11-10 01:43:34",
                "deleted_at": null
            },
            "user": {
                "id": 7,
                "name": "Cecile Considine",
                "username": "daugherty",
                "email": "rosenbaum.alverta@example.net",
                "email_verified_at": "2019-11-03 23:58:30",
                "role_id": 3,
                "created_at": "2019-11-03 23:58:30",
                "updated_at": "2019-11-03 23:58:30",
                "deleted_at": null
            }
        },
        {
            "id": 3,
            "titulo_noticia": "Quantas horas Cristiano Ronaldo dorme?",
            "corpo_noticia": "Afinal de contas não são as 8 horas que nos fazem bem",
            "user_id": 14,
            "jornal_id": 3,
            "seccao_id": 4,
            "created_at": "2019-11-04 21:42:40",
            "updated_at": "2019-11-04 23:37:17",
            "deleted_at": null,
            "jornal": {
                "id": 3,
                "name_jornal": "Diário de uns bananas",
                "description": "Este diário visa apresentar todas as importâncias do turismo rural de \r\nMoreira de Cónegos",
                "user_id": 13,
                "created_at": "2019-11-04 18:22:01",
                "updated_at": "2019-11-04 18:22:01",
                "deleted_at": null
            },
            "seccao": {
                "id": 4,
                "nome_seccao": "Destaques",
                "imagem_seccao": "images\/Oh4K2rsQ3xkMVZuuVH2ILIAxV1ubFYvp6wDYYc7e.png",
                "created_at": "2019-11-04 12:18:57",
                "updated_at": "2019-11-04 12:18:57",
                "deleted_at": null
            },
            "user": {
                "id": 14,
                "name": "Eino Howell",
                "username": "farrell",
                "email": "annabelle97@example.org",
                "email_verified_at": "2019-11-03 23:58:30",
                "role_id": 3,
                "created_at": "2019-11-03 23:58:30",
                "updated_at": "2019-11-03 23:58:30",
                "deleted_at": null
            }
        },
        {
            "id": 4,
            "titulo_noticia": "Ivo Rosa pediu aos advogados entregassem os telemóveis",
            "corpo_noticia": "Magistrados pretende assim evitar fugas de informação para os media durante os interrogatórios.",
            "user_id": 14,
            "jornal_id": 4,
            "seccao_id": 5,
            "created_at": "2019-11-04 21:44:42",
            "updated_at": "2019-11-04 21:44:42",
            "deleted_at": null,
            "jornal": {
                "id": 4,
                "name_jornal": "Rosa News",
                "description": "Uma compilação de artigos  sobre a vida alheia das pessoas famosas",
                "user_id": 18,
                "created_at": "2019-11-04 18:43:03",
                "updated_at": "2019-11-10 12:19:37",
                "deleted_at": null
            },
            "seccao": {
                "id": 5,
                "nome_seccao": "Política",
                "imagem_seccao": "images\/qjEgydwVYOHZslPzSnV34jAg6jF3xk4AXRKmNCJy.png",
                "created_at": "2019-11-04 16:05:23",
                "updated_at": "2019-11-04 16:05:23",
                "deleted_at": null
            },
            "user": {
                "id": 14,
                "name": "Eino Howell",
                "username": "farrell",
                "email": "annabelle97@example.org",
                "email_verified_at": "2019-11-03 23:58:30",
                "role_id": 3,
                "created_at": "2019-11-03 23:58:30",
                "updated_at": "2019-11-03 23:58:30",
                "deleted_at": null
            }
        },
        {
            "id": 6,
            "titulo_noticia": "Quais são os que oferecem as melhores condições?",
            "corpo_noticia": "Hoje em dia temos, pelo menos, um cartão de cliente na nossa carteira.",
            "user_id": 5,
            "jornal_id": 1,
            "seccao_id": 3,
            "created_at": "2019-11-04 23:49:27",
            "updated_at": "2019-11-04 23:49:27",
            "deleted_at": null,
            "jornal": {
                "id": 1,
                "name_jornal": "Jornal da Escolas",
                "description": "Este Jornal pertence à escola EB2\/3 de Guimarãesssss",
                "user_id": 2,
                "created_at": "2019-11-04 00:13:08",
                "updated_at": "2019-11-09 21:53:25",
                "deleted_at": null
            },
            "seccao": {
                "id": 3,
                "nome_seccao": "Economia",
                "imagem_seccao": "images\/ySreEWJIstOLoNz0Y3a4z720PhTYDTAH8sFxCgrB.png",
                "created_at": "2019-11-04 12:16:38",
                "updated_at": "2019-11-04 15:51:53",
                "deleted_at": null
            },
            "user": {
                "id": 5,
                "name": "Miss Anais Erdman PhD",
                "username": "rolfson",
                "email": "xnikolaus@example.org",
                "email_verified_at": "2019-11-03 23:58:30",
                "role_id": 3,
                "created_at": "2019-11-03 23:58:30",
                "updated_at": "2019-11-03 23:58:30",
                "deleted_at": null
            }
        },
        {
            "id": 7,
            "titulo_noticia": "Aveiro uma cidade de amor",
            "corpo_noticia": "As escadarias da cidade aveirense tem vindo a ser um ponto turísticos para os estrangeiros.",
            "user_id": 11,
            "jornal_id": 7,
            "seccao_id": 1,
            "created_at": "2019-11-05 17:30:01",
            "updated_at": "2019-11-05 17:30:01",
            "deleted_at": null,
            "jornal": {
                "id": 7,
                "name_jornal": "Albergaria",
                "description": "Secundária de Albergaria inaugorou um clube de jornalismo",
                "user_id": 4,
                "created_at": "2019-11-05 16:17:09",
                "updated_at": "2019-11-05 16:17:09",
                "deleted_at": null
            },
            "seccao": {
                "id": 1,
                "nome_seccao": "Cultura",
                "imagem_seccao": "images\/HAWX8OG1L1647PTuP9kU5FVh8xTGGT8WaO1vXhfx.png",
                "created_at": "2019-11-04 00:02:07",
                "updated_at": "2019-11-10 01:43:34",
                "deleted_at": null
            },
            "user": {
                "id": 11,
                "name": "Dr. Rex Huels",
                "username": "ernser",
                "email": "lucy10@example.org",
                "email_verified_at": "2019-11-03 23:58:30",
                "role_id": 3,
                "created_at": "2019-11-03 23:58:30",
                "updated_at": "2019-11-03 23:58:30",
                "deleted_at": null
            }
        },
        {
            "id": 8,
            "titulo_noticia": "Soy una Editora Ambientalista",
            "corpo_noticia": "Una chica de 21 anos que ama ambiente",
            "user_id": 24,
            "jornal_id": 4,
            "seccao_id": 7,
            "created_at": "2019-11-09 00:52:16",
            "updated_at": "2019-11-09 00:52:16",
            "deleted_at": null,
            "jornal": {
                "id": 4,
                "name_jornal": "Rosa News",
                "description": "Uma compilação de artigos  sobre a vida alheia das pessoas famosas",
                "user_id": 18,
                "created_at": "2019-11-04 18:43:03",
                "updated_at": "2019-11-10 12:19:37",
                "deleted_at": null
            },
            "seccao": {
                "id": 7,
                "nome_seccao": "Ambiente",
                "imagem_seccao": "images\/cogQe2R3R0kBpOu2HgRSOXUajLEo2jJcJ68vGopG.png",
                "created_at": "2019-11-08 17:30:56",
                "updated_at": "2019-11-08 17:30:56",
                "deleted_at": null
            },
            "user": {
                "id": 24,
                "name": "Sofia",
                "username": "sophz",
                "email": "sophz@tdi.pt",
                "email_verified_at": null,
                "role_id": 2,
                "created_at": "2019-11-08 23:20:00",
                "updated_at": "2019-11-08 23:20:00",
                "deleted_at": null
            }
        },
        {
            "id": 10,
            "titulo_noticia": "Polícia Marítima vai aumentar efectivos",
            "corpo_noticia": "João Gomes Cravinho disse que vai ser aberto concurso para contratar e formar mais 25 novos agentes.",
            "user_id": 24,
            "jornal_id": 9,
            "seccao_id": 5,
            "created_at": "2019-11-10 15:16:38",
            "updated_at": "2019-11-10 15:21:31",
            "deleted_at": null,
            "jornal": {
                "id": 9,
                "name_jornal": "FiloSofá 2",
                "description": "Leia descontraído o seu jornal",
                "user_id": 24,
                "created_at": "2019-11-10 12:16:41",
                "updated_at": "2019-11-10 12:21:40",
                "deleted_at": null
            },
            "seccao": {
                "id": 5,
                "nome_seccao": "Política",
                "imagem_seccao": "images\/qjEgydwVYOHZslPzSnV34jAg6jF3xk4AXRKmNCJy.png",
                "created_at": "2019-11-04 16:05:23",
                "updated_at": "2019-11-04 16:05:23",
                "deleted_at": null
            },
            "user": {
                "id": 24,
                "name": "Sofia",
                "username": "sophz",
                "email": "sophz@tdi.pt",
                "email_verified_at": null,
                "role_id": 2,
                "created_at": "2019-11-08 23:20:00",
                "updated_at": "2019-11-08 23:20:00",
                "deleted_at": null
            }
        }
    ],
    "message": "Listagem de Noticias",
    "result": "OK"
}
```

### HTTP Request
`GET api/noticia`

#### Body Parameters

Parameter | Type | Status | Description
--------- | ------- | ------- | ------- | -----------
    200 | integer |  optional  | OK -> mostra a informação

<!-- END_3e0792dacbd9e7d214dcc50f52939226 -->

<!-- START_b998b180dfdf8db4acac794a90f5c1d0 -->
## Apresentação do formulário de inserir notícias.

> Example request:

```bash
curl -X GET -G "http://localhost/api/noticia/create" \
    -H "Content-Type: application/json" \
    -d '{"message":"eius"}'

```

```javascript
const url = new URL("http://localhost/api/noticia/create");

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
}

let body = {
    "message": "eius"
}

fetch(url, {
    method: "GET",
    headers: headers,
    body: body
})
    .then(response => response.json())
    .then(json => console.log(json));
```


> Example response (500):

```json
{
    "message": "Server Error"
}
```

### HTTP Request
`GET api/noticia/create`

#### Body Parameters

Parameter | Type | Status | Description
--------- | ------- | ------- | ------- | -----------
    message | string |  required  | para validar se o utilizador com role de reporter, editor ou admin é diferente

<!-- END_b998b180dfdf8db4acac794a90f5c1d0 -->

<!-- START_0762f61893b0e6cb43e2bbc304701edb -->
## Inserir uma notícia na Base de dados.

> Example request:

```bash
curl -X POST "http://localhost/api/noticia" \
    -H "Content-Type: application/json" \
    -d '{"titulo_noticia":"ea","corpo_noticia":"quasi","jornal_id":13,"seccao_id":13,"user_id":16}'

```

```javascript
const url = new URL("http://localhost/api/noticia");

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
}

let body = {
    "titulo_noticia": "ea",
    "corpo_noticia": "quasi",
    "jornal_id": 13,
    "seccao_id": 13,
    "user_id": 16
}

fetch(url, {
    method: "POST",
    headers: headers,
    body: body
})
    .then(response => response.json())
    .then(json => console.log(json));
```



### HTTP Request
`POST api/noticia`

#### Body Parameters

Parameter | Type | Status | Description
--------- | ------- | ------- | ------- | -----------
    titulo_noticia | string |  required  | necessário ter um nome para a notícia
    corpo_noticia | string |  required  | necessário ter um corpo de notícia
    jornal_id | integer |  required  | necessário saber a que Jornal pertence esta notícia
    seccao_id | integer |  required  | necessário saber a secção da notícia
    user_id | integer |  required  | necessário saber quem é o repórter do Jornal

<!-- END_0762f61893b0e6cb43e2bbc304701edb -->

<!-- START_8cc30809f2423150c9e8944ef3c84fe2 -->
## Apresentação de uma notícia específica.

> Example request:

```bash
curl -X GET -G "http://localhost/api/noticia/1" 
```

```javascript
const url = new URL("http://localhost/api/noticia/1");

let headers = {
    "Accept": "application/json",
    "Content-Type": "application/json",
}

fetch(url, {
    method: "GET",
    headers: headers,
})
    .then(response => response.json())
    .then(json => console.log(json));
```


> Example response (200):

```json
{
    "id": 1,
    "titulo_noticia": "Reforma nos dias de hoje é válida?",
    "corpo_noticia": "Hoje em dia nao ha reforma porque somos roubados",
    "user_id": 1,
    "jornal_id": 1,
    "seccao_id": 3,
    "created_at": "2019-11-04 00:14:32",
    "updated_at": "2019-11-12 11:11:26",
    "deleted_at": null
}
```

### HTTP Request
`GET api/noticia/{noticium}`


<!-- END_8cc30809f2423150c9e8944ef3c84fe2 -->

<!-- START_e2b64a92180d97911f45a4e151785890 -->
## Apresentação do formulário de editar noticias.

> Example request:

```bash
curl -X GET -G "http://localhost/api/noticia/1/edit" 
```

```javascript
const url = new URL("http://localhost/api/noticia/1/edit");

let headers = {
    "Accept": "application/json",
    "Content-Type": "application/json",
}

fetch(url, {
    method: "GET",
    headers: headers,
})
    .then(response => response.json())
    .then(json => console.log(json));
```


> Example response (500):

```json
{
    "message": "Server Error"
}
```

### HTTP Request
`GET api/noticia/{noticium}/edit`


<!-- END_e2b64a92180d97911f45a4e151785890 -->

<!-- START_156ca02905b8dd3ca8e4b87881fd8031 -->
## Atualização de uma noticia específica
 Ao editar uma notícia presente no feed, é enviado o ID especifico do mesmo, nessa
ligação, a função formupdate irá associar o id da notícia apresentando toda a informação
sobre a mesma

> Example request:

```bash
curl -X PUT "http://localhost/api/noticia/1?titulo_noticia=vel&corpo_noticia=sed&jornal_id=ipsum&seccao_id=omnis&user_id=consequatur" 
```

```javascript
const url = new URL("http://localhost/api/noticia/1");

    let params = {
            "titulo_noticia": "vel",
            "corpo_noticia": "sed",
            "jornal_id": "ipsum",
            "seccao_id": "omnis",
            "user_id": "consequatur",
        };
    Object.keys(params).forEach(key => url.searchParams.append(key, params[key]));

let headers = {
    "Accept": "application/json",
    "Content-Type": "application/json",
}

fetch(url, {
    method: "PUT",
    headers: headers,
})
    .then(response => response.json())
    .then(json => console.log(json));
```



### HTTP Request
`PUT api/noticia/{noticium}`

`PATCH api/noticia/{noticium}`

#### Query Parameters

Parameter | Status | Description
--------- | ------- | ------- | -----------
    titulo_noticia |  required  | Título da notícia
    corpo_noticia |  required  | Corpo da notícia
    jornal_id |  required  | Jornal da respetiva notícia
    seccao_id |  required  | Secção da respetiva notícia
    user_id |  required  | Repórter da notícia

<!-- END_156ca02905b8dd3ca8e4b87881fd8031 -->

<!-- START_7b913bb5385521eaf328d30e7c974d63 -->
## Eliminar uma notícia específica

Ao clique no botão de eliminar notícia, o ID dessa mesma irá
ser eliminado da base de dados

> Example request:

```bash
curl -X DELETE "http://localhost/api/noticia/1" 
```

```javascript
const url = new URL("http://localhost/api/noticia/1");

let headers = {
    "Accept": "application/json",
    "Content-Type": "application/json",
}

fetch(url, {
    method: "DELETE",
    headers: headers,
})
    .then(response => response.json())
    .then(json => console.log(json));
```



### HTTP Request
`DELETE api/noticia/{noticium}`


<!-- END_7b913bb5385521eaf328d30e7c974d63 -->

#API da edição de fotografias 


APIs para editar e ver fotografias
<!-- START_12d833dba4727a0d6221314a87a63f9d -->
## Apresentação das imagens editadas
Interpretação ver as imagens que já foram editadas limitas a número de páginas
HTTP Response

> Example request:

```bash
curl -X GET -G "http://localhost/api/content_image" \
    -H "Content-Type: application/json" \
    -d '{"200":9}'

```

```javascript
const url = new URL("http://localhost/api/content_image");

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
}

let body = {
    "200": 9
}

fetch(url, {
    method: "GET",
    headers: headers,
    body: body
})
    .then(response => response.json())
    .then(json => console.log(json));
```


> Example response (401):

```json
{
    "message": "Unauthenticated."
}
```

### HTTP Request
`GET api/content_image`

#### Body Parameters

Parameter | Type | Status | Description
--------- | ------- | ------- | ------- | -----------
    200 | integer |  optional  | OK -> mostra a informação

<!-- END_12d833dba4727a0d6221314a87a63f9d -->

<!-- START_c33f0d99f989b18cc4134619a74f5095 -->
## Formulário para inserir uma imagem editada

> Example request:

```bash
curl -X GET -G "http://localhost/api/content_image/create" 
```

```javascript
const url = new URL("http://localhost/api/content_image/create");

let headers = {
    "Accept": "application/json",
    "Content-Type": "application/json",
}

fetch(url, {
    method: "GET",
    headers: headers,
})
    .then(response => response.json())
    .then(json => console.log(json));
```


> Example response (401):

```json
{
    "message": "Unauthenticated."
}
```

### HTTP Request
`GET api/content_image/create`


<!-- END_c33f0d99f989b18cc4134619a74f5095 -->

<!-- START_bdd3bde8caad0c55378b83d369b17cd9 -->
## Inserir uma imagem editada na Base de dados.

> Example request:

```bash
curl -X POST "http://localhost/api/content_image" \
    -H "Content-Type: application/json" \
    -d '{"ficheiro_image":"similique","jornal_id":2687.33868742999993628473021090030670166015625,"effectvalue":"soluta"}'

```

```javascript
const url = new URL("http://localhost/api/content_image");

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
}

let body = {
    "ficheiro_image": "similique",
    "jornal_id": 2687.33868742999993628473021090030670166015625,
    "effectvalue": "soluta"
}

fetch(url, {
    method: "POST",
    headers: headers,
    body: body
})
    .then(response => response.json())
    .then(json => console.log(json));
```



### HTTP Request
`POST api/content_image`

#### Body Parameters

Parameter | Type | Status | Description
--------- | ------- | ------- | ------- | -----------
    ficheiro_image | string |  required  | Enviar a Image
    jornal_id | number |  required  | Enviar o jornal
    effectvalue | string |  required  | Enviar valor do efeito para colocar na Image

<!-- END_bdd3bde8caad0c55378b83d369b17cd9 -->

<!-- START_7e090303432dd860daf3495f5c283f36 -->
## Apresentação de uma imagem editada específica.

> Example request:

```bash
curl -X GET -G "http://localhost/api/content_image/1" \
    -H "Content-Type: application/json" \
    -d '{"conteudoeditados":[]}'

```

```javascript
const url = new URL("http://localhost/api/content_image/1");

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
}

let body = {
    "conteudoeditados": []
}

fetch(url, {
    method: "GET",
    headers: headers,
    body: body
})
    .then(response => response.json())
    .then(json => console.log(json));
```


> Example response (401):

```json
{
    "message": "Unauthenticated."
}
```

### HTTP Request
`GET api/content_image/{content_image}`

#### Body Parameters

Parameter | Type | Status | Description
--------- | ------- | ------- | ------- | -----------
    conteudoeditados | array |  required  | Envia imagem, o id do jornal e data de criação

<!-- END_7e090303432dd860daf3495f5c283f36 -->

<!-- START_74fccf27eb0cbd17f1847504a9e11a61 -->
## Não atualiza

> Example request:

```bash
curl -X GET -G "http://localhost/api/content_image/1/edit" 
```

```javascript
const url = new URL("http://localhost/api/content_image/1/edit");

let headers = {
    "Accept": "application/json",
    "Content-Type": "application/json",
}

fetch(url, {
    method: "GET",
    headers: headers,
})
    .then(response => response.json())
    .then(json => console.log(json));
```


> Example response (401):

```json
{
    "message": "Unauthenticated."
}
```

### HTTP Request
`GET api/content_image/{content_image}/edit`


<!-- END_74fccf27eb0cbd17f1847504a9e11a61 -->

<!-- START_845315eccc67af9c49cb3f4c947f5c77 -->
## Não atualiza

> Example request:

```bash
curl -X PUT "http://localhost/api/content_image/1" 
```

```javascript
const url = new URL("http://localhost/api/content_image/1");

let headers = {
    "Accept": "application/json",
    "Content-Type": "application/json",
}

fetch(url, {
    method: "PUT",
    headers: headers,
})
    .then(response => response.json())
    .then(json => console.log(json));
```



### HTTP Request
`PUT api/content_image/{content_image}`

`PATCH api/content_image/{content_image}`


<!-- END_845315eccc67af9c49cb3f4c947f5c77 -->

<!-- START_f09b124b77d377d73ea9f5d5873024b5 -->
## Eliminar uma imagem editada específica

Não elimina

> Example request:

```bash
curl -X DELETE "http://localhost/api/content_image/1" 
```

```javascript
const url = new URL("http://localhost/api/content_image/1");

let headers = {
    "Accept": "application/json",
    "Content-Type": "application/json",
}

fetch(url, {
    method: "DELETE",
    headers: headers,
})
    .then(response => response.json())
    .then(json => console.log(json));
```



### HTTP Request
`DELETE api/content_image/{content_image}`


<!-- END_f09b124b77d377d73ea9f5d5873024b5 -->

#API do Conteudo


APIs para gerir conteudo
<!-- START_ae40e4cc614878a2ded01d8d7df5e43c -->
## Apresentação dos conteúdos proudzidos por grandes repórteres.

Esta área destina-se à associação dos conteúdos audivisuais com as notícias
HTTP Response

> Example request:

```bash
curl -X GET -G "http://localhost/api/conteudo" \
    -H "Content-Type: application/json" \
    -d '{"200":1}'

```

```javascript
const url = new URL("http://localhost/api/conteudo");

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
}

let body = {
    "200": 1
}

fetch(url, {
    method: "GET",
    headers: headers,
    body: body
})
    .then(response => response.json())
    .then(json => console.log(json));
```


> Example response (200):

```json
{
    "data": [
        {
            "id": 1,
            "tipo_conteudo": "Audio",
            "ficheiro_conteudo": "ficheiros_conteudos\/G5lnHz3yn3jYNVHOg9CBgr10DUtmwDHZHXzSMSBn.mpga",
            "noticia_id": 2,
            "user_id": 24,
            "created_at": "2019-11-05 11:28:19",
            "updated_at": "2019-11-10 16:21:18",
            "deleted_at": null,
            "noticia": {
                "id": 2,
                "titulo_noticia": "Os golfinhos no Tejo",
                "corpo_noticia": "Golfinhos no tejo são lindos",
                "user_id": 7,
                "jornal_id": 1,
                "seccao_id": 1,
                "created_at": "2019-11-04 11:24:57",
                "updated_at": "2019-11-04 11:24:57",
                "deleted_at": null
            }
        },
        {
            "id": 2,
            "tipo_conteudo": "Imagem",
            "ficheiro_conteudo": "ficheiros_conteudos\/W72iHGtDWUrcSnmumhwYzP5ckTAPDaMhhgunCNyo.jpeg",
            "noticia_id": 6,
            "user_id": 9,
            "created_at": "2019-11-05 11:32:49",
            "updated_at": "2019-11-05 17:27:31",
            "deleted_at": null,
            "noticia": {
                "id": 6,
                "titulo_noticia": "Quais são os que oferecem as melhores condições?",
                "corpo_noticia": "Hoje em dia temos, pelo menos, um cartão de cliente na nossa carteira.",
                "user_id": 5,
                "jornal_id": 1,
                "seccao_id": 3,
                "created_at": "2019-11-04 23:49:27",
                "updated_at": "2019-11-04 23:49:27",
                "deleted_at": null
            }
        },
        {
            "id": 3,
            "tipo_conteudo": "Audio",
            "ficheiro_conteudo": "ficheiros_conteudos\/aJHR28acR1770bciMbeyZJubqARB7ZiCpVFy7DuI.mpga",
            "noticia_id": 2,
            "user_id": 6,
            "created_at": "2019-11-05 11:35:00",
            "updated_at": "2019-11-05 11:35:00",
            "deleted_at": null,
            "noticia": {
                "id": 2,
                "titulo_noticia": "Os golfinhos no Tejo",
                "corpo_noticia": "Golfinhos no tejo são lindos",
                "user_id": 7,
                "jornal_id": 1,
                "seccao_id": 1,
                "created_at": "2019-11-04 11:24:57",
                "updated_at": "2019-11-04 11:24:57",
                "deleted_at": null
            }
        },
        {
            "id": 4,
            "tipo_conteudo": "Audio",
            "ficheiro_conteudo": "ficheiros_conteudos\/aHjED7H6keK8GEoK07LtwVGoQd19xEmiygjHdpOy.mpga",
            "noticia_id": 4,
            "user_id": 6,
            "created_at": "2019-11-05 13:07:31",
            "updated_at": "2019-11-05 13:07:31",
            "deleted_at": null,
            "noticia": {
                "id": 4,
                "titulo_noticia": "Ivo Rosa pediu aos advogados entregassem os telemóveis",
                "corpo_noticia": "Magistrados pretende assim evitar fugas de informação para os media durante os interrogatórios.",
                "user_id": 14,
                "jornal_id": 4,
                "seccao_id": 5,
                "created_at": "2019-11-04 21:44:42",
                "updated_at": "2019-11-04 21:44:42",
                "deleted_at": null
            }
        },
        {
            "id": 5,
            "tipo_conteudo": "Video",
            "ficheiro_conteudo": "ficheiros_conteudos\/BOfrp8EzPxRgRefBT0MntvrBb989iYrCzbBnMgfB.mp4",
            "noticia_id": 6,
            "user_id": 17,
            "created_at": "2019-11-05 15:09:01",
            "updated_at": "2019-11-05 15:28:04",
            "deleted_at": null,
            "noticia": {
                "id": 6,
                "titulo_noticia": "Quais são os que oferecem as melhores condições?",
                "corpo_noticia": "Hoje em dia temos, pelo menos, um cartão de cliente na nossa carteira.",
                "user_id": 5,
                "jornal_id": 1,
                "seccao_id": 3,
                "created_at": "2019-11-04 23:49:27",
                "updated_at": "2019-11-04 23:49:27",
                "deleted_at": null
            }
        },
        {
            "id": 6,
            "tipo_conteudo": "Video",
            "ficheiro_conteudo": "ficheiros_conteudos\/qKOSP6eeKoHTJf6MJfgHesMdDas8Do5TOXpJKef4.mp4",
            "noticia_id": 3,
            "user_id": 3,
            "created_at": "2019-11-05 15:28:23",
            "updated_at": "2019-11-06 19:27:36",
            "deleted_at": null,
            "noticia": {
                "id": 3,
                "titulo_noticia": "Quantas horas Cristiano Ronaldo dorme?",
                "corpo_noticia": "Afinal de contas não são as 8 horas que nos fazem bem",
                "user_id": 14,
                "jornal_id": 3,
                "seccao_id": 4,
                "created_at": "2019-11-04 21:42:40",
                "updated_at": "2019-11-04 23:37:17",
                "deleted_at": null
            }
        },
        {
            "id": 16,
            "tipo_conteudo": "Video",
            "ficheiro_conteudo": "ficheiros_conteudos\/88z04pSxdjUcpZTMfHqE6ubON3VjMAJ6vYWBRwfl.gif",
            "noticia_id": 7,
            "user_id": 1,
            "created_at": "2019-11-05 17:36:36",
            "updated_at": "2019-11-05 17:36:51",
            "deleted_at": null,
            "noticia": {
                "id": 7,
                "titulo_noticia": "Aveiro uma cidade de amor",
                "corpo_noticia": "As escadarias da cidade aveirense tem vindo a ser um ponto turísticos para os estrangeiros.",
                "user_id": 11,
                "jornal_id": 7,
                "seccao_id": 1,
                "created_at": "2019-11-05 17:30:01",
                "updated_at": "2019-11-05 17:30:01",
                "deleted_at": null
            }
        },
        {
            "id": 17,
            "tipo_conteudo": "Audio",
            "ficheiro_conteudo": "ficheiros_conteudos\/77pikKrq0PRFHl7cZxlSK1oev0GeCuB1ckSPBIJI.mpga",
            "noticia_id": 7,
            "user_id": 7,
            "created_at": "2019-11-05 17:40:53",
            "updated_at": "2019-11-05 17:40:53",
            "deleted_at": null,
            "noticia": {
                "id": 7,
                "titulo_noticia": "Aveiro uma cidade de amor",
                "corpo_noticia": "As escadarias da cidade aveirense tem vindo a ser um ponto turísticos para os estrangeiros.",
                "user_id": 11,
                "jornal_id": 7,
                "seccao_id": 1,
                "created_at": "2019-11-05 17:30:01",
                "updated_at": "2019-11-05 17:30:01",
                "deleted_at": null
            }
        },
        {
            "id": 19,
            "tipo_conteudo": "Audio",
            "ficheiro_conteudo": "ficheiros_conteudos\/yVIVSxDCuIleXZJS3Z3P1nAECTK9pMraH6e3j1Tt.mpga",
            "noticia_id": 2,
            "user_id": 11,
            "created_at": "2019-11-08 17:07:29",
            "updated_at": "2019-11-08 17:07:42",
            "deleted_at": null,
            "noticia": {
                "id": 2,
                "titulo_noticia": "Os golfinhos no Tejo",
                "corpo_noticia": "Golfinhos no tejo são lindos",
                "user_id": 7,
                "jornal_id": 1,
                "seccao_id": 1,
                "created_at": "2019-11-04 11:24:57",
                "updated_at": "2019-11-04 11:24:57",
                "deleted_at": null
            }
        },
        {
            "id": 20,
            "tipo_conteudo": "Imagem",
            "ficheiro_conteudo": "ficheiros_conteudos\/cXnFSIbpZWwlUquQAd4ykIf71RBlVoQs3MhBdM9W.jpeg",
            "noticia_id": 8,
            "user_id": 4,
            "created_at": "2019-11-10 01:04:38",
            "updated_at": "2019-11-10 01:04:38",
            "deleted_at": null,
            "noticia": {
                "id": 8,
                "titulo_noticia": "Soy una Editora Ambientalista",
                "corpo_noticia": "Una chica de 21 anos que ama ambiente",
                "user_id": 24,
                "jornal_id": 4,
                "seccao_id": 7,
                "created_at": "2019-11-09 00:52:16",
                "updated_at": "2019-11-09 00:52:16",
                "deleted_at": null
            }
        },
        {
            "id": 22,
            "tipo_conteudo": "Audio",
            "ficheiro_conteudo": "ficheiros_conteudos\/lZlol9gyQcytwCZH5qrNnnxt9IawGP2ja9XrS7aA.mpga",
            "noticia_id": 6,
            "user_id": 24,
            "created_at": "2019-11-10 01:29:21",
            "updated_at": "2019-11-10 16:09:45",
            "deleted_at": null,
            "noticia": {
                "id": 6,
                "titulo_noticia": "Quais são os que oferecem as melhores condições?",
                "corpo_noticia": "Hoje em dia temos, pelo menos, um cartão de cliente na nossa carteira.",
                "user_id": 5,
                "jornal_id": 1,
                "seccao_id": 3,
                "created_at": "2019-11-04 23:49:27",
                "updated_at": "2019-11-04 23:49:27",
                "deleted_at": null
            }
        },
        {
            "id": 23,
            "tipo_conteudo": "Imagem",
            "ficheiro_conteudo": "ficheiros_conteudos\/Zs5SmDkpmTTYLaKSvoGoj3wacjr7C7KZevw1GvOv.mpga",
            "noticia_id": 10,
            "user_id": 24,
            "created_at": "2019-11-10 15:54:06",
            "updated_at": "2019-11-10 15:54:28",
            "deleted_at": null,
            "noticia": {
                "id": 10,
                "titulo_noticia": "Polícia Marítima vai aumentar efectivos",
                "corpo_noticia": "João Gomes Cravinho disse que vai ser aberto concurso para contratar e formar mais 25 novos agentes.",
                "user_id": 24,
                "jornal_id": 9,
                "seccao_id": 5,
                "created_at": "2019-11-10 15:16:38",
                "updated_at": "2019-11-10 15:21:31",
                "deleted_at": null
            }
        },
        {
            "id": 24,
            "tipo_conteudo": "Video",
            "ficheiro_conteudo": "ficheiros_conteudos\/Q8bDYoin39uzTPYwt5ldGdQDDf09ZScppBv3Qwds.jpeg",
            "noticia_id": 7,
            "user_id": 24,
            "created_at": "2019-11-10 16:14:01",
            "updated_at": "2019-11-10 16:14:01",
            "deleted_at": null,
            "noticia": {
                "id": 7,
                "titulo_noticia": "Aveiro uma cidade de amor",
                "corpo_noticia": "As escadarias da cidade aveirense tem vindo a ser um ponto turísticos para os estrangeiros.",
                "user_id": 11,
                "jornal_id": 7,
                "seccao_id": 1,
                "created_at": "2019-11-05 17:30:01",
                "updated_at": "2019-11-05 17:30:01",
                "deleted_at": null
            }
        }
    ],
    "message": "Listagem de conteudos",
    "result": "OK"
}
```

### HTTP Request
`GET api/conteudo`

#### Body Parameters

Parameter | Type | Status | Description
--------- | ------- | ------- | ------- | -----------
    200 | integer |  optional  | OK -> mostra a informação

<!-- END_ae40e4cc614878a2ded01d8d7df5e43c -->

<!-- START_aadaa2eb2b4e86964415926923e0608c -->
## Inserir conteúdos na Base de dados.

> Example request:

```bash
curl -X POST "http://localhost/api/conteudo" \
    -H "Content-Type: application/json" \
    -d '{"tipo_conteudo":"totam","ficheiro_conteudo":"consequuntur","noticia_id":3,"user_id":14}'

```

```javascript
const url = new URL("http://localhost/api/conteudo");

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
}

let body = {
    "tipo_conteudo": "totam",
    "ficheiro_conteudo": "consequuntur",
    "noticia_id": 3,
    "user_id": 14
}

fetch(url, {
    method: "POST",
    headers: headers,
    body: body
})
    .then(response => response.json())
    .then(json => console.log(json));
```



### HTTP Request
`POST api/conteudo`

#### Body Parameters

Parameter | Type | Status | Description
--------- | ------- | ------- | ------- | -----------
    tipo_conteudo | string |  required  | necessário associar se é Audio, Video, ou Imagem
    ficheiro_conteudo | string |  required  | o ficheiro para realizar upload do conteúdo em vários formatos(mpga,mp3,mp4,avi,jpg,jpeg,png,gif)
    noticia_id | integer |  required  | perceber para que notícia irá o conteúdo
    user_id | integer |  required  | identificar o produtor do conteúdo

<!-- END_aadaa2eb2b4e86964415926923e0608c -->

<!-- START_a6e9c981bc6d6499887d5d19af8d38fa -->
## Apresentação de uma noticia específica

Apresentar uma notíca com base no ID

> Example request:

```bash
curl -X GET -G "http://localhost/api/conteudo/1" 
```

```javascript
const url = new URL("http://localhost/api/conteudo/1");

let headers = {
    "Accept": "application/json",
    "Content-Type": "application/json",
}

fetch(url, {
    method: "GET",
    headers: headers,
})
    .then(response => response.json())
    .then(json => console.log(json));
```


> Example response:

```json
null
```

### HTTP Request
`GET api/conteudo/{conteudo}`


<!-- END_a6e9c981bc6d6499887d5d19af8d38fa -->

<!-- START_46604a715ff1b553fad14d7bf2eae329 -->
## Atualização de um conteúdo específica
Ao editar o conteúdo presente no feed, é enviado o ID especifico do mesmo, nessa
ligação, a função formupdate irá associar o id do conteudo apresentando toda a informação
sobre o conteúdo

> Example request:

```bash
curl -X PUT "http://localhost/api/conteudo/1?tipo_conteudo=maxime&ficheiro_conteudo=in&noticia_id=nobis&user_id=corporis" 
```

```javascript
const url = new URL("http://localhost/api/conteudo/1");

    let params = {
            "tipo_conteudo": "maxime",
            "ficheiro_conteudo": "in",
            "noticia_id": "nobis",
            "user_id": "corporis",
        };
    Object.keys(params).forEach(key => url.searchParams.append(key, params[key]));

let headers = {
    "Accept": "application/json",
    "Content-Type": "application/json",
}

fetch(url, {
    method: "PUT",
    headers: headers,
})
    .then(response => response.json())
    .then(json => console.log(json));
```



### HTTP Request
`PUT api/conteudo/{conteudo}`

`PATCH api/conteudo/{conteudo}`

#### Query Parameters

Parameter | Status | Description
--------- | ------- | ------- | -----------
    tipo_conteudo |  required  | Tipo de conteúdo
    ficheiro_conteudo |  required  | Ficheiro do conteúdo
    noticia_id |  required  | Notícia
    user_id |  required  | Produtor do conteúdo

<!-- END_46604a715ff1b553fad14d7bf2eae329 -->

<!-- START_1ec48b924a87894925c1bce4aedb1e11 -->
## Eliminar conteúdo específico

Ao clique no botão de eliminar conteúdo, o ID desse mesmo irá
ser eliminado na base de dados

> Example request:

```bash
curl -X DELETE "http://localhost/api/conteudo/1" 
```

```javascript
const url = new URL("http://localhost/api/conteudo/1");

let headers = {
    "Accept": "application/json",
    "Content-Type": "application/json",
}

fetch(url, {
    method: "DELETE",
    headers: headers,
})
    .then(response => response.json())
    .then(json => console.log(json));
```



### HTTP Request
`DELETE api/conteudo/{conteudo}`


<!-- END_1ec48b924a87894925c1bce4aedb1e11 -->

#API do Jornal 


APIs para gerir jornais
<!-- START_d984a021fe81033b627b61ae0096b7e7 -->
## Apresentação dos jornais associados aos editores.

Interpretação de quem pertence o jornal
HTTP Response

> Example request:

```bash
curl -X GET -G "http://localhost/api/jornal" \
    -H "Content-Type: application/json" \
    -d '{"200":12}'

```

```javascript
const url = new URL("http://localhost/api/jornal");

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
}

let body = {
    "200": 12
}

fetch(url, {
    method: "GET",
    headers: headers,
    body: body
})
    .then(response => response.json())
    .then(json => console.log(json));
```


> Example response (200):

```json
{
    "data": [
        {
            "id": 1,
            "name_jornal": "Jornal da Escolas",
            "description": "Este Jornal pertence à escola EB2\/3 de Guimarãesssss",
            "user_id": 2,
            "created_at": "2019-11-04 00:13:08",
            "updated_at": "2019-11-09 21:53:25",
            "deleted_at": null,
            "user": {
                "id": 2,
                "name": "Editor João",
                "username": "editortdi",
                "email": "editor@tdi.pt",
                "email_verified_at": null,
                "role_id": 2,
                "created_at": "2019-11-03 23:58:30",
                "updated_at": "2019-11-04 10:56:37",
                "deleted_at": null
            }
        },
        {
            "id": 2,
            "name_jornal": "Noticarte",
            "description": "Escola Secundária de Aveiro, tem alunos muito proativos",
            "user_id": 4,
            "created_at": "2019-11-04 00:13:45",
            "updated_at": "2019-11-09 23:16:55",
            "deleted_at": null,
            "user": {
                "id": 4,
                "name": "Selena Becker I",
                "username": "damore",
                "email": "weber.sabina@example.com",
                "email_verified_at": "2019-11-03 23:58:30",
                "role_id": 3,
                "created_at": "2019-11-03 23:58:30",
                "updated_at": "2019-11-03 23:58:30",
                "deleted_at": null
            }
        },
        {
            "id": 3,
            "name_jornal": "Diário de uns bananas",
            "description": "Este diário visa apresentar todas as importâncias do turismo rural de \r\nMoreira de Cónegos",
            "user_id": 13,
            "created_at": "2019-11-04 18:22:01",
            "updated_at": "2019-11-04 18:22:01",
            "deleted_at": null,
            "user": {
                "id": 13,
                "name": "Reba Nienow",
                "username": "grady",
                "email": "logan94@example.org",
                "email_verified_at": "2019-11-03 23:58:30",
                "role_id": 3,
                "created_at": "2019-11-03 23:58:30",
                "updated_at": "2019-11-03 23:58:30",
                "deleted_at": null
            }
        },
        {
            "id": 4,
            "name_jornal": "Rosa News",
            "description": "Uma compilação de artigos  sobre a vida alheia das pessoas famosas",
            "user_id": 18,
            "created_at": "2019-11-04 18:43:03",
            "updated_at": "2019-11-10 12:19:37",
            "deleted_at": null,
            "user": {
                "id": 18,
                "name": "Wilmer Shields",
                "username": "jaskolski",
                "email": "kaela05@example.org",
                "email_verified_at": "2019-11-03 23:58:30",
                "role_id": 3,
                "created_at": "2019-11-03 23:58:30",
                "updated_at": "2019-11-03 23:58:30",
                "deleted_at": null
            }
        },
        {
            "id": 7,
            "name_jornal": "Albergaria",
            "description": "Secundária de Albergaria inaugorou um clube de jornalismo",
            "user_id": 4,
            "created_at": "2019-11-05 16:17:09",
            "updated_at": "2019-11-05 16:17:09",
            "deleted_at": null,
            "user": {
                "id": 4,
                "name": "Selena Becker I",
                "username": "damore",
                "email": "weber.sabina@example.com",
                "email_verified_at": "2019-11-03 23:58:30",
                "role_id": 3,
                "created_at": "2019-11-03 23:58:30",
                "updated_at": "2019-11-03 23:58:30",
                "deleted_at": null
            }
        },
        {
            "id": 9,
            "name_jornal": "FiloSofá 2",
            "description": "Leia descontraído o seu jornal",
            "user_id": 24,
            "created_at": "2019-11-10 12:16:41",
            "updated_at": "2019-11-10 12:21:40",
            "deleted_at": null,
            "user": {
                "id": 24,
                "name": "Sofia",
                "username": "sophz",
                "email": "sophz@tdi.pt",
                "email_verified_at": null,
                "role_id": 2,
                "created_at": "2019-11-08 23:20:00",
                "updated_at": "2019-11-08 23:20:00",
                "deleted_at": null
            }
        },
        {
            "id": 13,
            "name_jornal": "Teste",
            "description": "sdf",
            "user_id": 24,
            "created_at": "2019-11-12 17:12:51",
            "updated_at": "2019-11-12 17:12:51",
            "deleted_at": null,
            "user": {
                "id": 24,
                "name": "Sofia",
                "username": "sophz",
                "email": "sophz@tdi.pt",
                "email_verified_at": null,
                "role_id": 2,
                "created_at": "2019-11-08 23:20:00",
                "updated_at": "2019-11-08 23:20:00",
                "deleted_at": null
            }
        }
    ],
    "message": "Listagem de jornais",
    "result": "OK"
}
```

### HTTP Request
`GET api/jornal`

#### Body Parameters

Parameter | Type | Status | Description
--------- | ------- | ------- | ------- | -----------
    200 | integer |  optional  | OK -> mostra a informação

<!-- END_d984a021fe81033b627b61ae0096b7e7 -->

<!-- START_0be096f9a4a24696c0101813229d4400 -->
## Apresentação do formulário de inserir jornais.

> Example request:

```bash
curl -X GET -G "http://localhost/api/jornal/create" 
```

```javascript
const url = new URL("http://localhost/api/jornal/create");

let headers = {
    "Accept": "application/json",
    "Content-Type": "application/json",
}

fetch(url, {
    method: "GET",
    headers: headers,
})
    .then(response => response.json())
    .then(json => console.log(json));
```


> Example response (500):

```json
{
    "message": "Server Error"
}
```

### HTTP Request
`GET api/jornal/create`


<!-- END_0be096f9a4a24696c0101813229d4400 -->

<!-- START_7afb5643f3d58dcaf7b7260a3f7c8503 -->
## Inserir uma notícia na Base de dados.

> Example request:

```bash
curl -X POST "http://localhost/api/jornal" \
    -H "Content-Type: application/json" \
    -d '{"name_jornal":"consequuntur","description":"doloribus","user_id":20}'

```

```javascript
const url = new URL("http://localhost/api/jornal");

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
}

let body = {
    "name_jornal": "consequuntur",
    "description": "doloribus",
    "user_id": 20
}

fetch(url, {
    method: "POST",
    headers: headers,
    body: body
})
    .then(response => response.json())
    .then(json => console.log(json));
```



### HTTP Request
`POST api/jornal`

#### Body Parameters

Parameter | Type | Status | Description
--------- | ------- | ------- | ------- | -----------
    name_jornal | string |  required  | Dar um nome criativo ao Jornal
    description | string |  required  | necessário ter uma descrição associada ao Jornal
    user_id | integer |  required  | necessário saber a quem pertence o jornal

<!-- END_7afb5643f3d58dcaf7b7260a3f7c8503 -->

<!-- START_f7c0e9011ca5e915ffdd557c2fcc4dca -->
## Apresentação de um jornal específicao

Apresenta um jornal tendo por base no ID

> Example request:

```bash
curl -X GET -G "http://localhost/api/jornal/1" 
```

```javascript
const url = new URL("http://localhost/api/jornal/1");

let headers = {
    "Accept": "application/json",
    "Content-Type": "application/json",
}

fetch(url, {
    method: "GET",
    headers: headers,
})
    .then(response => response.json())
    .then(json => console.log(json));
```


> Example response (200):

```json
{
    "id": 1,
    "name_jornal": "Jornal da Escolas",
    "description": "Este Jornal pertence à escola EB2\/3 de Guimarãesssss",
    "user_id": 2,
    "created_at": "2019-11-04 00:13:08",
    "updated_at": "2019-11-09 21:53:25",
    "deleted_at": null
}
```

### HTTP Request
`GET api/jornal/{jornal}`


<!-- END_f7c0e9011ca5e915ffdd557c2fcc4dca -->

<!-- START_553cb7ab2a5bbbfb4fb264cb8101f070 -->
## Apresentação do formulário de editar jornais.

> Example request:

```bash
curl -X GET -G "http://localhost/api/jornal/1/edit" 
```

```javascript
const url = new URL("http://localhost/api/jornal/1/edit");

let headers = {
    "Accept": "application/json",
    "Content-Type": "application/json",
}

fetch(url, {
    method: "GET",
    headers: headers,
})
    .then(response => response.json())
    .then(json => console.log(json));
```


> Example response (500):

```json
{
    "message": "Server Error"
}
```

### HTTP Request
`GET api/jornal/{jornal}/edit`


<!-- END_553cb7ab2a5bbbfb4fb264cb8101f070 -->

<!-- START_c9596a52c5b6129b0ce629d00465bab2 -->
## Atualização de um jornal específico
Ao editar um jornal presente no feed, é enviado o ID especifico do mesmo, nessa
ligação, a função formupdate irá associar o id do jornal apresentando toda a informação
sobre o mesmo

> Example request:

```bash
curl -X PUT "http://localhost/api/jornal/1?name_jornal=consequatur&description=ratione&user_id=molestiae" 
```

```javascript
const url = new URL("http://localhost/api/jornal/1");

    let params = {
            "name_jornal": "consequatur",
            "description": "ratione",
            "user_id": "molestiae",
        };
    Object.keys(params).forEach(key => url.searchParams.append(key, params[key]));

let headers = {
    "Accept": "application/json",
    "Content-Type": "application/json",
}

fetch(url, {
    method: "PUT",
    headers: headers,
})
    .then(response => response.json())
    .then(json => console.log(json));
```



### HTTP Request
`PUT api/jornal/{jornal}`

`PATCH api/jornal/{jornal}`

#### Query Parameters

Parameter | Status | Description
--------- | ------- | ------- | -----------
    name_jornal |  required  | Título do jornal
    description |  required  | Descrição sobre o jornal
    user_id |  required  | Editor do jornal

<!-- END_c9596a52c5b6129b0ce629d00465bab2 -->

<!-- START_393ce75aea456cc35670e7edc3a415db -->
## Eliminar um jornal específico

Ao clique no botão de eliminar jornal, o ID desse mesmo irá
ser eliminado na base de dados

> Example request:

```bash
curl -X DELETE "http://localhost/api/jornal/1" 
```

```javascript
const url = new URL("http://localhost/api/jornal/1");

let headers = {
    "Accept": "application/json",
    "Content-Type": "application/json",
}

fetch(url, {
    method: "DELETE",
    headers: headers,
})
    .then(response => response.json())
    .then(json => console.log(json));
```



### HTTP Request
`DELETE api/jornal/{jornal}`


<!-- END_393ce75aea456cc35670e7edc3a415db -->

#API do Secção 


APIs para gerir secções
<!-- START_030396ffd2b4f1352cc510e7450ccc38 -->
## Apresenta das secções dos jornais

HTTP Response

> Example request:

```bash
curl -X GET -G "http://localhost/api/seccao" \
    -H "Content-Type: application/json" \
    -d '{"200":13}'

```

```javascript
const url = new URL("http://localhost/api/seccao");

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
}

let body = {
    "200": 13
}

fetch(url, {
    method: "GET",
    headers: headers,
    body: body
})
    .then(response => response.json())
    .then(json => console.log(json));
```


> Example response (200):

```json
{
    "data": [
        {
            "id": 1,
            "nome_seccao": "Cultura",
            "imagem_seccao": "images\/HAWX8OG1L1647PTuP9kU5FVh8xTGGT8WaO1vXhfx.png",
            "created_at": "2019-11-04 00:02:07",
            "updated_at": "2019-11-10 01:43:34",
            "deleted_at": null
        },
        {
            "id": 3,
            "nome_seccao": "Economia",
            "imagem_seccao": "images\/ySreEWJIstOLoNz0Y3a4z720PhTYDTAH8sFxCgrB.png",
            "created_at": "2019-11-04 12:16:38",
            "updated_at": "2019-11-04 15:51:53",
            "deleted_at": null
        },
        {
            "id": 4,
            "nome_seccao": "Destaques",
            "imagem_seccao": "images\/Oh4K2rsQ3xkMVZuuVH2ILIAxV1ubFYvp6wDYYc7e.png",
            "created_at": "2019-11-04 12:18:57",
            "updated_at": "2019-11-04 12:18:57",
            "deleted_at": null
        },
        {
            "id": 5,
            "nome_seccao": "Política",
            "imagem_seccao": "images\/qjEgydwVYOHZslPzSnV34jAg6jF3xk4AXRKmNCJy.png",
            "created_at": "2019-11-04 16:05:23",
            "updated_at": "2019-11-04 16:05:23",
            "deleted_at": null
        },
        {
            "id": 7,
            "nome_seccao": "Ambiente",
            "imagem_seccao": "images\/cogQe2R3R0kBpOu2HgRSOXUajLEo2jJcJ68vGopG.png",
            "created_at": "2019-11-08 17:30:56",
            "updated_at": "2019-11-08 17:30:56",
            "deleted_at": null
        }
    ],
    "message": "Listagem de Seccao",
    "result": "OK"
}
```

### HTTP Request
`GET api/seccao`

#### Body Parameters

Parameter | Type | Status | Description
--------- | ------- | ------- | ------- | -----------
    200 | integer |  optional  | OK -> mostra a informação

<!-- END_030396ffd2b4f1352cc510e7450ccc38 -->

<!-- START_1b1f7d56556b7285bfc23844b38df594 -->
## Inserir uma secção na Base de dados.

> Example request:

```bash
curl -X POST "http://localhost/api/seccao" \
    -H "Content-Type: application/json" \
    -d '{"nome_seccao":"minus","imagem_seccao":"eligendi"}'

```

```javascript
const url = new URL("http://localhost/api/seccao");

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
}

let body = {
    "nome_seccao": "minus",
    "imagem_seccao": "eligendi"
}

fetch(url, {
    method: "POST",
    headers: headers,
    body: body
})
    .then(response => response.json())
    .then(json => console.log(json));
```



### HTTP Request
`POST api/seccao`

#### Body Parameters

Parameter | Type | Status | Description
--------- | ------- | ------- | ------- | -----------
    nome_seccao | string |  required  | necessário ter um nome para a secção
    imagem_seccao | string |  required  | necessário ter uma imagem

<!-- END_1b1f7d56556b7285bfc23844b38df594 -->

<!-- START_b81882dcd03a927ddf68a119e1587ef4 -->
## Atualização de uma secção específica
Ao editar uma secção presente no feed, é enviado o ID especifico do mesmo, nessa
ligação, a função formupdate irá associar o id da secção apresentando toda a informação
sobre a mesma

> Example request:

```bash
curl -X PUT "http://localhost/api/seccao/1?nome_seccao=fugiat&imagem_seccao=illum" 
```

```javascript
const url = new URL("http://localhost/api/seccao/1");

    let params = {
            "nome_seccao": "fugiat",
            "imagem_seccao": "illum",
        };
    Object.keys(params).forEach(key => url.searchParams.append(key, params[key]));

let headers = {
    "Accept": "application/json",
    "Content-Type": "application/json",
}

fetch(url, {
    method: "PUT",
    headers: headers,
})
    .then(response => response.json())
    .then(json => console.log(json));
```



### HTTP Request
`PUT api/seccao/{seccao}`

`PATCH api/seccao/{seccao}`

#### Query Parameters

Parameter | Status | Description
--------- | ------- | ------- | -----------
    nome_seccao |  required  | nome da secção
    imagem_seccao |  required  | imagem da secção

<!-- END_b81882dcd03a927ddf68a119e1587ef4 -->

<!-- START_93f52473e766962fb6e3ef5b7362a130 -->
## Eliminar uma notícia específica

Ao clique no botão de eliminar Secção, o ID dessa mesma irá
ser eliminado da base de dados

> Example request:

```bash
curl -X DELETE "http://localhost/api/seccao/1" 
```

```javascript
const url = new URL("http://localhost/api/seccao/1");

let headers = {
    "Accept": "application/json",
    "Content-Type": "application/json",
}

fetch(url, {
    method: "DELETE",
    headers: headers,
})
    .then(response => response.json())
    .then(json => console.log(json));
```



### HTTP Request
`DELETE api/seccao/{seccao}`


<!-- END_93f52473e766962fb6e3ef5b7362a130 -->

#API do Tema de personalização do jornal


APIs para gerir temas
<!-- START_e15d622d2c1cc9b6028629590d26ebc3 -->
## Apresenta dos temas de personalização dos jornais

HTTP Response

> Example request:

```bash
curl -X GET -G "http://localhost/api/tema" \
    -H "Content-Type: application/json" \
    -d '{"200":5}'

```

```javascript
const url = new URL("http://localhost/api/tema");

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
}

let body = {
    "200": 5
}

fetch(url, {
    method: "GET",
    headers: headers,
    body: body
})
    .then(response => response.json())
    .then(json => console.log(json));
```


> Example response (200):

```json
{
    "data": [
        {
            "id": 1,
            "nome_tema": "dark",
            "created_at": "2019-11-12 11:02:10",
            "updated_at": "2019-11-12 11:02:10",
            "deleted_at": null
        },
        {
            "id": 2,
            "nome_tema": "green",
            "created_at": "2019-11-12 11:02:25",
            "updated_at": "2019-11-12 11:42:22",
            "deleted_at": null
        },
        {
            "id": 4,
            "nome_tema": "rose",
            "created_at": "2019-11-12 11:40:42",
            "updated_at": "2019-11-12 11:40:42",
            "deleted_at": null
        },
        {
            "id": 6,
            "nome_tema": "Sweet",
            "created_at": "2019-11-12 14:02:33",
            "updated_at": "2019-11-12 14:02:33",
            "deleted_at": null
        }
    ],
    "message": "Listagem de temas",
    "result": "OK"
}
```

### HTTP Request
`GET api/tema`

#### Body Parameters

Parameter | Type | Status | Description
--------- | ------- | ------- | ------- | -----------
    200 | integer |  optional  | OK -> mostra a informação

<!-- END_e15d622d2c1cc9b6028629590d26ebc3 -->

<!-- START_9b074c9bede6dcf60e337a8a6c66e4a6 -->
## Show the form for creating a new resource.

> Example request:

```bash
curl -X GET -G "http://localhost/api/tema/create" 
```

```javascript
const url = new URL("http://localhost/api/tema/create");

let headers = {
    "Accept": "application/json",
    "Content-Type": "application/json",
}

fetch(url, {
    method: "GET",
    headers: headers,
})
    .then(response => response.json())
    .then(json => console.log(json));
```


> Example response:

```json
null
```

### HTTP Request
`GET api/tema/create`


<!-- END_9b074c9bede6dcf60e337a8a6c66e4a6 -->

<!-- START_dc99fdadeadba564ccfa628d3230481b -->
## Inserir um tema na Base de dados.

> Example request:

```bash
curl -X POST "http://localhost/api/tema" \
    -H "Content-Type: application/json" \
    -d '{"nometema":"ad"}'

```

```javascript
const url = new URL("http://localhost/api/tema");

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
}

let body = {
    "nometema": "ad"
}

fetch(url, {
    method: "POST",
    headers: headers,
    body: body
})
    .then(response => response.json())
    .then(json => console.log(json));
```



### HTTP Request
`POST api/tema`

#### Body Parameters

Parameter | Type | Status | Description
--------- | ------- | ------- | ------- | -----------
    nometema | string |  required  | necessário ter um nome para o tema

<!-- END_dc99fdadeadba564ccfa628d3230481b -->

<!-- START_e0d9f141c49734c6967cf330bb543453 -->
## Apresentar um tema específico

> Example request:

```bash
curl -X GET -G "http://localhost/api/tema/1" 
```

```javascript
const url = new URL("http://localhost/api/tema/1");

let headers = {
    "Accept": "application/json",
    "Content-Type": "application/json",
}

fetch(url, {
    method: "GET",
    headers: headers,
})
    .then(response => response.json())
    .then(json => console.log(json));
```


> Example response (200):

```json
{
    "id": 1,
    "nome_tema": "dark",
    "created_at": "2019-11-12 11:02:10",
    "updated_at": "2019-11-12 11:02:10",
    "deleted_at": null
}
```

### HTTP Request
`GET api/tema/{tema}`


<!-- END_e0d9f141c49734c6967cf330bb543453 -->

<!-- START_6ab6754c1fd9b6a905e550c264f7c3e9 -->
## Apresentação do form para editar um tema específico

> Example request:

```bash
curl -X GET -G "http://localhost/api/tema/1/edit" 
```

```javascript
const url = new URL("http://localhost/api/tema/1/edit");

let headers = {
    "Accept": "application/json",
    "Content-Type": "application/json",
}

fetch(url, {
    method: "GET",
    headers: headers,
})
    .then(response => response.json())
    .then(json => console.log(json));
```


> Example response (200):

```json
{
    "seccoes": [
        {
            "id": 1,
            "nome_tema": "dark",
            "created_at": "2019-11-12 11:02:10",
            "updated_at": "2019-11-12 11:02:10",
            "deleted_at": null
        }
    ],
    "message": "Form de atualizar temas",
    "result": "OK"
}
```

### HTTP Request
`GET api/tema/{tema}/edit`


<!-- END_6ab6754c1fd9b6a905e550c264f7c3e9 -->

<!-- START_bc7bae02cd8ee1d4ac9ede16880ea23f -->
## Atualização de um tema específico

> Example request:

```bash
curl -X PUT "http://localhost/api/tema/1?nome_tema=voluptates" 
```

```javascript
const url = new URL("http://localhost/api/tema/1");

    let params = {
            "nome_tema": "voluptates",
        };
    Object.keys(params).forEach(key => url.searchParams.append(key, params[key]));

let headers = {
    "Accept": "application/json",
    "Content-Type": "application/json",
}

fetch(url, {
    method: "PUT",
    headers: headers,
})
    .then(response => response.json())
    .then(json => console.log(json));
```



### HTTP Request
`PUT api/tema/{tema}`

`PATCH api/tema/{tema}`

#### Query Parameters

Parameter | Status | Description
--------- | ------- | ------- | -----------
    nome_tema |  required  | nome do tema que pretende adicionar

<!-- END_bc7bae02cd8ee1d4ac9ede16880ea23f -->

<!-- START_1e7d52fa883beabf6d1e36016c81f787 -->
## Eliminar uma notícia específica

Ao clique no botão de eliminar Secção, o ID dessa mesma irá
ser eliminado da base de dados

> Example request:

```bash
curl -X DELETE "http://localhost/api/tema/1" 
```

```javascript
const url = new URL("http://localhost/api/tema/1");

let headers = {
    "Accept": "application/json",
    "Content-Type": "application/json",
}

fetch(url, {
    method: "DELETE",
    headers: headers,
})
    .then(response => response.json())
    .then(json => console.log(json));
```



### HTTP Request
`DELETE api/tema/{tema}`


<!-- END_1e7d52fa883beabf6d1e36016c81f787 -->

#API do tema do jornal


 APIs para gerir os temas dos jornais
<!-- START_57c54d728d3d74001178760afbf00d03 -->
## Apresentação das notícias realizadas por grandes repórteres.

Interpretação apresentação da associção do tema ao respetivo jornal
HTTP Response

> Example request:

```bash
curl -X GET -G "http://localhost/api/temajornal" \
    -H "Content-Type: application/json" \
    -d '{"200":9}'

```

```javascript
const url = new URL("http://localhost/api/temajornal");

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
}

let body = {
    "200": 9
}

fetch(url, {
    method: "GET",
    headers: headers,
    body: body
})
    .then(response => response.json())
    .then(json => console.log(json));
```


> Example response (200):

```json
{
    "data": [
        {
            "id": 1,
            "jornal_id": 1,
            "tema_id": 1,
            "created_at": "2019-11-12 12:24:35",
            "updated_at": "2019-11-12 12:30:15",
            "deleted_at": null,
            "jornal": {
                "id": 1,
                "name_jornal": "Jornal da Escolas",
                "description": "Este Jornal pertence à escola EB2\/3 de Guimarãesssss",
                "user_id": 2,
                "created_at": "2019-11-04 00:13:08",
                "updated_at": "2019-11-09 21:53:25",
                "deleted_at": null
            },
            "tema": {
                "id": 1,
                "nome_tema": "dark",
                "created_at": "2019-11-12 11:02:10",
                "updated_at": "2019-11-12 11:02:10",
                "deleted_at": null
            }
        },
        {
            "id": 2,
            "jornal_id": 2,
            "tema_id": 6,
            "created_at": "2019-11-12 12:28:06",
            "updated_at": "2019-11-12 16:48:20",
            "deleted_at": null,
            "jornal": {
                "id": 2,
                "name_jornal": "Noticarte",
                "description": "Escola Secundária de Aveiro, tem alunos muito proativos",
                "user_id": 4,
                "created_at": "2019-11-04 00:13:45",
                "updated_at": "2019-11-09 23:16:55",
                "deleted_at": null
            },
            "tema": {
                "id": 6,
                "nome_tema": "Sweet",
                "created_at": "2019-11-12 14:02:33",
                "updated_at": "2019-11-12 14:02:33",
                "deleted_at": null
            }
        },
        {
            "id": 5,
            "jornal_id": 9,
            "tema_id": 4,
            "created_at": "2019-11-12 14:30:36",
            "updated_at": "2019-11-12 14:30:36",
            "deleted_at": null,
            "jornal": {
                "id": 9,
                "name_jornal": "FiloSofá 2",
                "description": "Leia descontraído o seu jornal",
                "user_id": 24,
                "created_at": "2019-11-10 12:16:41",
                "updated_at": "2019-11-10 12:21:40",
                "deleted_at": null
            },
            "tema": {
                "id": 4,
                "nome_tema": "rose",
                "created_at": "2019-11-12 11:40:42",
                "updated_at": "2019-11-12 11:40:42",
                "deleted_at": null
            }
        },
        {
            "id": 9,
            "jornal_id": 13,
            "tema_id": 2,
            "created_at": "2019-11-12 17:14:30",
            "updated_at": "2019-11-12 17:14:30",
            "deleted_at": null,
            "jornal": {
                "id": 13,
                "name_jornal": "Teste",
                "description": "sdf",
                "user_id": 24,
                "created_at": "2019-11-12 17:12:51",
                "updated_at": "2019-11-12 17:12:51",
                "deleted_at": null
            },
            "tema": {
                "id": 2,
                "nome_tema": "green",
                "created_at": "2019-11-12 11:02:25",
                "updated_at": "2019-11-12 11:42:22",
                "deleted_at": null
            }
        }
    ],
    "message": "Listagem do tema do respetivo jornal",
    "result": "OK"
}
```

### HTTP Request
`GET api/temajornal`

#### Body Parameters

Parameter | Type | Status | Description
--------- | ------- | ------- | ------- | -----------
    200 | integer |  optional  | OK -> mostra a informação

<!-- END_57c54d728d3d74001178760afbf00d03 -->

<!-- START_eb24aa9ad545d753d8aa45cd45319d56 -->
## Apresentação do formulário para associar um tema a um jornal.

> Example request:

```bash
curl -X GET -G "http://localhost/api/temajornal/create" 
```

```javascript
const url = new URL("http://localhost/api/temajornal/create");

let headers = {
    "Accept": "application/json",
    "Content-Type": "application/json",
}

fetch(url, {
    method: "GET",
    headers: headers,
})
    .then(response => response.json())
    .then(json => console.log(json));
```


> Example response (200):

```json
{
    "jornais": [
        {
            "id": 1,
            "name_jornal": "Jornal da Escolas",
            "description": "Este Jornal pertence à escola EB2\/3 de Guimarãesssss",
            "user_id": 2,
            "created_at": "2019-11-04 00:13:08",
            "updated_at": "2019-11-09 21:53:25",
            "deleted_at": null
        },
        {
            "id": 2,
            "name_jornal": "Noticarte",
            "description": "Escola Secundária de Aveiro, tem alunos muito proativos",
            "user_id": 4,
            "created_at": "2019-11-04 00:13:45",
            "updated_at": "2019-11-09 23:16:55",
            "deleted_at": null
        },
        {
            "id": 3,
            "name_jornal": "Diário de uns bananas",
            "description": "Este diário visa apresentar todas as importâncias do turismo rural de \r\nMoreira de Cónegos",
            "user_id": 13,
            "created_at": "2019-11-04 18:22:01",
            "updated_at": "2019-11-04 18:22:01",
            "deleted_at": null
        },
        {
            "id": 4,
            "name_jornal": "Rosa News",
            "description": "Uma compilação de artigos  sobre a vida alheia das pessoas famosas",
            "user_id": 18,
            "created_at": "2019-11-04 18:43:03",
            "updated_at": "2019-11-10 12:19:37",
            "deleted_at": null
        },
        {
            "id": 7,
            "name_jornal": "Albergaria",
            "description": "Secundária de Albergaria inaugorou um clube de jornalismo",
            "user_id": 4,
            "created_at": "2019-11-05 16:17:09",
            "updated_at": "2019-11-05 16:17:09",
            "deleted_at": null
        },
        {
            "id": 9,
            "name_jornal": "FiloSofá 2",
            "description": "Leia descontraído o seu jornal",
            "user_id": 24,
            "created_at": "2019-11-10 12:16:41",
            "updated_at": "2019-11-10 12:21:40",
            "deleted_at": null
        },
        {
            "id": 13,
            "name_jornal": "Teste",
            "description": "sdf",
            "user_id": 24,
            "created_at": "2019-11-12 17:12:51",
            "updated_at": "2019-11-12 17:12:51",
            "deleted_at": null
        }
    ],
    "tema": [
        {
            "id": 1,
            "nome_tema": "dark",
            "created_at": "2019-11-12 11:02:10",
            "updated_at": "2019-11-12 11:02:10",
            "deleted_at": null
        },
        {
            "id": 2,
            "nome_tema": "green",
            "created_at": "2019-11-12 11:02:25",
            "updated_at": "2019-11-12 11:42:22",
            "deleted_at": null
        },
        {
            "id": 4,
            "nome_tema": "rose",
            "created_at": "2019-11-12 11:40:42",
            "updated_at": "2019-11-12 11:40:42",
            "deleted_at": null
        },
        {
            "id": 6,
            "nome_tema": "Sweet",
            "created_at": "2019-11-12 14:02:33",
            "updated_at": "2019-11-12 14:02:33",
            "deleted_at": null
        }
    ],
    "message": "Form Tema Jornal",
    "result": "OK"
}
```

### HTTP Request
`GET api/temajornal/create`


<!-- END_eb24aa9ad545d753d8aa45cd45319d56 -->

<!-- START_d3c35599423f6c834e90f2b177cfdb6f -->
## * Inserir a associação do tema ao jornal na Base de dados.

> Example request:

```bash
curl -X POST "http://localhost/api/temajornal" 
```

```javascript
const url = new URL("http://localhost/api/temajornal");

let headers = {
    "Accept": "application/json",
    "Content-Type": "application/json",
}

fetch(url, {
    method: "POST",
    headers: headers,
})
    .then(response => response.json())
    .then(json => console.log(json));
```



### HTTP Request
`POST api/temajornal`


<!-- END_d3c35599423f6c834e90f2b177cfdb6f -->

<!-- START_d6ed9b34864e9f0d2ca88c1c589a4e8a -->
## Apresentação de uma associação específica.

> Example request:

```bash
curl -X GET -G "http://localhost/api/temajornal/1" 
```

```javascript
const url = new URL("http://localhost/api/temajornal/1");

let headers = {
    "Accept": "application/json",
    "Content-Type": "application/json",
}

fetch(url, {
    method: "GET",
    headers: headers,
})
    .then(response => response.json())
    .then(json => console.log(json));
```


> Example response (200):

```json
{
    "id": 1,
    "jornal_id": 1,
    "tema_id": 1,
    "created_at": "2019-11-12 12:24:35",
    "updated_at": "2019-11-12 12:30:15",
    "deleted_at": null
}
```

### HTTP Request
`GET api/temajornal/{temajornal}`


<!-- END_d6ed9b34864e9f0d2ca88c1c589a4e8a -->

<!-- START_f4f9aea103e22f92ad41ee21a685ccaf -->
## Apresentação do formulário para editar associação.

> Example request:

```bash
curl -X GET -G "http://localhost/api/temajornal/1/edit" 
```

```javascript
const url = new URL("http://localhost/api/temajornal/1/edit");

let headers = {
    "Accept": "application/json",
    "Content-Type": "application/json",
}

fetch(url, {
    method: "GET",
    headers: headers,
})
    .then(response => response.json())
    .then(json => console.log(json));
```


> Example response (200):

```json
{
    "temajornal": [
        {
            "id": 1,
            "jornal_id": 1,
            "tema_id": 1,
            "created_at": "2019-11-12 12:24:35",
            "updated_at": "2019-11-12 12:30:15",
            "deleted_at": null
        }
    ],
    "jornais": [
        {
            "id": 1,
            "name_jornal": "Jornal da Escolas",
            "description": "Este Jornal pertence à escola EB2\/3 de Guimarãesssss",
            "user_id": 2,
            "created_at": "2019-11-04 00:13:08",
            "updated_at": "2019-11-09 21:53:25",
            "deleted_at": null
        },
        {
            "id": 2,
            "name_jornal": "Noticarte",
            "description": "Escola Secundária de Aveiro, tem alunos muito proativos",
            "user_id": 4,
            "created_at": "2019-11-04 00:13:45",
            "updated_at": "2019-11-09 23:16:55",
            "deleted_at": null
        },
        {
            "id": 3,
            "name_jornal": "Diário de uns bananas",
            "description": "Este diário visa apresentar todas as importâncias do turismo rural de \r\nMoreira de Cónegos",
            "user_id": 13,
            "created_at": "2019-11-04 18:22:01",
            "updated_at": "2019-11-04 18:22:01",
            "deleted_at": null
        },
        {
            "id": 4,
            "name_jornal": "Rosa News",
            "description": "Uma compilação de artigos  sobre a vida alheia das pessoas famosas",
            "user_id": 18,
            "created_at": "2019-11-04 18:43:03",
            "updated_at": "2019-11-10 12:19:37",
            "deleted_at": null
        },
        {
            "id": 7,
            "name_jornal": "Albergaria",
            "description": "Secundária de Albergaria inaugorou um clube de jornalismo",
            "user_id": 4,
            "created_at": "2019-11-05 16:17:09",
            "updated_at": "2019-11-05 16:17:09",
            "deleted_at": null
        },
        {
            "id": 9,
            "name_jornal": "FiloSofá 2",
            "description": "Leia descontraído o seu jornal",
            "user_id": 24,
            "created_at": "2019-11-10 12:16:41",
            "updated_at": "2019-11-10 12:21:40",
            "deleted_at": null
        },
        {
            "id": 13,
            "name_jornal": "Teste",
            "description": "sdf",
            "user_id": 24,
            "created_at": "2019-11-12 17:12:51",
            "updated_at": "2019-11-12 17:12:51",
            "deleted_at": null
        }
    ],
    "tema": [
        {
            "id": 1,
            "nome_tema": "dark",
            "created_at": "2019-11-12 11:02:10",
            "updated_at": "2019-11-12 11:02:10",
            "deleted_at": null
        },
        {
            "id": 2,
            "nome_tema": "green",
            "created_at": "2019-11-12 11:02:25",
            "updated_at": "2019-11-12 11:42:22",
            "deleted_at": null
        },
        {
            "id": 4,
            "nome_tema": "rose",
            "created_at": "2019-11-12 11:40:42",
            "updated_at": "2019-11-12 11:40:42",
            "deleted_at": null
        },
        {
            "id": 6,
            "nome_tema": "Sweet",
            "created_at": "2019-11-12 14:02:33",
            "updated_at": "2019-11-12 14:02:33",
            "deleted_at": null
        }
    ],
    "message": "Form Tema Jornal para editar associação",
    "result": "OK"
}
```

### HTTP Request
`GET api/temajornal/{temajornal}/edit`


<!-- END_f4f9aea103e22f92ad41ee21a685ccaf -->

<!-- START_2548cc969b770479c898f1b5da2dde2b -->
## Atualização de uma associação específica

> Example request:

```bash
curl -X PUT "http://localhost/api/temajornal/1?jornal_id=aliquam&tema_id=enim" 
```

```javascript
const url = new URL("http://localhost/api/temajornal/1");

    let params = {
            "jornal_id": "aliquam",
            "tema_id": "enim",
        };
    Object.keys(params).forEach(key => url.searchParams.append(key, params[key]));

let headers = {
    "Accept": "application/json",
    "Content-Type": "application/json",
}

fetch(url, {
    method: "PUT",
    headers: headers,
})
    .then(response => response.json())
    .then(json => console.log(json));
```



### HTTP Request
`PUT api/temajornal/{temajornal}`

`PATCH api/temajornal/{temajornal}`

#### Query Parameters

Parameter | Status | Description
--------- | ------- | ------- | -----------
    jornal_id |  required  | Saber qual é o jornal
    tema_id |  required  | Saber qual é o tema

<!-- END_2548cc969b770479c898f1b5da2dde2b -->

<!-- START_6d9c53ddd19a5287cb34b7ad98adabd5 -->
## Remove the specified resource from storage.

> Example request:

```bash
curl -X DELETE "http://localhost/api/temajornal/1" 
```

```javascript
const url = new URL("http://localhost/api/temajornal/1");

let headers = {
    "Accept": "application/json",
    "Content-Type": "application/json",
}

fetch(url, {
    method: "DELETE",
    headers: headers,
})
    .then(response => response.json())
    .then(json => console.log(json));
```



### HTTP Request
`DELETE api/temajornal/{temajornal}`


<!-- END_6d9c53ddd19a5287cb34b7ad98adabd5 -->


