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
    -d '{"200":4}'

```

```javascript
const url = new URL("http://localhost/api/noticia");

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
}

let body = {
    "200": 4
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
null
```

### HTTP Request
`GET api/noticia`

#### Body Parameters

Parameter | Type | Status | Description
--------- | ------- | ------- | ------- | -----------
    200 | integer |  optional  | OK -> mostra a informação

<!-- END_3e0792dacbd9e7d214dcc50f52939226 -->

<!-- START_0762f61893b0e6cb43e2bbc304701edb -->
## Inserir uma notícia na Base de dados.

Faz redirect da rota se armazenar os dados corretamente esta
verificação é realizada pelo http code 201

> Example request:

```bash
curl -X POST "http://localhost/api/noticia" \
    -H "Content-Type: application/json" \
    -d '{"titulo_noticia":"voluptas","corpo_noticia":"at","jornal_id":12,"seccao_id":11,"user_id":20}'

```

```javascript
const url = new URL("http://localhost/api/noticia");

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
}

let body = {
    "titulo_noticia": "voluptas",
    "corpo_noticia": "at",
    "jornal_id": 12,
    "seccao_id": 11,
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
## Apresentação de uma noticia específica

Apresentar uma notíca com base no ID

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
[]
```

### HTTP Request
`GET api/noticia/{noticium}`


<!-- END_8cc30809f2423150c9e8944ef3c84fe2 -->

<!-- START_156ca02905b8dd3ca8e4b87881fd8031 -->
## Atualização de uma noticia específica
 Ao editar uma notícia presente no feed, é enviado o ID especifico do mesmo, nessa
ligação, a função formupdate irá associar o id da notícia apresentando toda a informação
sobre a mesma

> Example request:

```bash
curl -X PUT "http://localhost/api/noticia/1?titulo_noticia=hic&corpo_noticia=vero&jornal_id=quia&seccao_id=totam&user_id=quidem" 
```

```javascript
const url = new URL("http://localhost/api/noticia/1");

    let params = {
            "titulo_noticia": "hic",
            "corpo_noticia": "vero",
            "jornal_id": "quia",
            "seccao_id": "totam",
            "user_id": "quidem",
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

#API da Secção management


APIs para gerir seccções
<!-- START_030396ffd2b4f1352cc510e7450ccc38 -->
## Apresenta das secções dos jornais

HTTP Response

> Example request:

```bash
curl -X GET -G "http://localhost/api/seccao" \
    -H "Content-Type: application/json" \
    -d '{"200":19}'

```

```javascript
const url = new URL("http://localhost/api/seccao");

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
}

let body = {
    "200": 19
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
null
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

Faz redirect da rota se armazenar os dados corretamente esta verificação é realizada
pelo http code 201

> Example request:

```bash
curl -X POST "http://localhost/api/seccao" \
    -H "Content-Type: application/json" \
    -d '{"nome_seccao":"quia","imagem_seccao":"expedita"}'

```

```javascript
const url = new URL("http://localhost/api/seccao");

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
}

let body = {
    "nome_seccao": "quia",
    "imagem_seccao": "expedita"
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
curl -X PUT "http://localhost/api/seccao/1?nome_seccao=nisi&imagem_seccao=molestiae" 
```

```javascript
const url = new URL("http://localhost/api/seccao/1");

    let params = {
            "nome_seccao": "nisi",
            "imagem_seccao": "molestiae",
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
    -d '{"200":6}'

```

```javascript
const url = new URL("http://localhost/api/conteudo");

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
null
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

Faz redirect da rota se armazenar os conteúdos corretamente
esta verificação é realizada pelo http code 201

> Example request:

```bash
curl -X POST "http://localhost/api/conteudo" \
    -H "Content-Type: application/json" \
    -d '{"tipo_conteudo":"quidem","ficheiro_conteudo":"laudantium","noticia_id":18,"user_id":15}'

```

```javascript
const url = new URL("http://localhost/api/conteudo");

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
}

let body = {
    "tipo_conteudo": "quidem",
    "ficheiro_conteudo": "laudantium",
    "noticia_id": 18,
    "user_id": 15
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
curl -X PUT "http://localhost/api/conteudo/1?tipo_conteudo=amet&ficheiro_conteudo=officiis&noticia_id=et&user_id=nulla" 
```

```javascript
const url = new URL("http://localhost/api/conteudo/1");

    let params = {
            "tipo_conteudo": "amet",
            "ficheiro_conteudo": "officiis",
            "noticia_id": "et",
            "user_id": "nulla",
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
    -d '{"200":13}'

```

```javascript
const url = new URL("http://localhost/api/jornal");

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
null
```

### HTTP Request
`GET api/jornal`

#### Body Parameters

Parameter | Type | Status | Description
--------- | ------- | ------- | ------- | -----------
    200 | integer |  optional  | OK -> mostra a informação

<!-- END_d984a021fe81033b627b61ae0096b7e7 -->

<!-- START_7afb5643f3d58dcaf7b7260a3f7c8503 -->
## Inserir uma notícia na Base de dados.

Faz redirect da rota se armazenar os dados corretamente esta
verificação é realizada pelo http code 201

> Example request:

```bash
curl -X POST "http://localhost/api/jornal" \
    -H "Content-Type: application/json" \
    -d '{"name_jornal":"nesciunt","description":"non","user_id":20}'

```

```javascript
const url = new URL("http://localhost/api/jornal");

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
}

let body = {
    "name_jornal": "nesciunt",
    "description": "non",
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
    "updated_at": "2019-11-05 16:19:41",
    "deleted_at": null
}
```

### HTTP Request
`GET api/jornal/{jornal}`


<!-- END_f7c0e9011ca5e915ffdd557c2fcc4dca -->

<!-- START_c9596a52c5b6129b0ce629d00465bab2 -->
## Atualização de um jornal específico
Ao editar um jornal presente no feed, é enviado o ID especifico do mesmo, nessa
ligação, a função formupdate irá associar o id do jornal apresentando toda a informação
sobre o mesmo

> Example request:

```bash
curl -X PUT "http://localhost/api/jornal/1?name_jornal=qui&description=officiis&user_id=nihil" 
```

```javascript
const url = new URL("http://localhost/api/jornal/1");

    let params = {
            "name_jornal": "qui",
            "description": "officiis",
            "user_id": "nihil",
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


