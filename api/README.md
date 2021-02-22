# Blog API - Endpoints

## GET /api/posts

+ Response 200 (application/json)

      {
          "lengh": 1,
          "posts": [
            {
              "title": "Post 3",
              "content_preview": "Lorem ipsum dolor sit amet, consectetur adipiscing elit",
              "cover_image_url": "https://source.unsplash.com/640x640/?rock-concert",
              "category": "category",
              "slug": "post-1",
              "author": "author",
              "created_at": "2021-02-09T04:06:54+01:00"
            },
            {...}
      }

## GET /api/posts/{slug}

+ Parameters
  + slug: `Post title abreviation`

+ Response 200 (application/json)

      {
          [
            {
              "title": "Post 1",
              "content_preview": "Lorem ipsum dolor sit amet, consectetur adipiscing elit"",
              "content": "Lorem ipsum dolor sit amet, consectetur adipiscing elit"",
              "cover_image_url": "https://source.unsplash.com/640x640/?rock-concert",
              "category": "category",
              "slug": "post-1",
              "author": "author",
              "created_at": "2021-02-09T04:06:54+01:00"
            }
          ]
      }
        
## POST /api/contact

+ Body Required (application/json)

      {
        "name":"name",
        "email":"email@email.com",
        "phone":"(00)00000 0000",
        "message":"message",
      }
        
+ Response 200 (application/json)

       {
          "success":true
       }
        
