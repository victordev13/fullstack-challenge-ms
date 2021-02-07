import React from 'react';
import style from '../styles/Posts.module.css';

export default function PostPreview({dataPost, size}){
    let limitContentPreview;

    if(size === 'small'){
        limitContentPreview = dataPost.content_preview.substr(0,200)+'...';
    }else{
        limitContentPreview = dataPost.content_preview.substr(0,450)+'...';
    }
    
    dataPost.content_preview = limitContentPreview;
    
    return(
        <div className={`${style.post_large} ${style.post}`}>
            <div>
                <img src={dataPost.cover_image_url}  
                    className={style.image_preview}/>
            </div>
            <div className={style.body_preview}>
                <p className={style.author}>
                    {dataPost.author}
                </p>
                <h2 className={style.title}>
                    {dataPost.title}
                </h2>
                <p className={style.content}>
                    {dataPost.content_preview}
                </p>
            </div>
        </div>
    );
}