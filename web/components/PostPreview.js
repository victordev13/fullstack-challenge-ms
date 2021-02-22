import React from 'react';
import Link from 'next/link';
import style from '../styles/Posts.module.css';

export default function PostPreview({dataPost, size}){
    let limitContentPreview;
    let sizeClass;

    if(size === 'small'){
        sizeClass = style.post_small;
        limitContentPreview = dataPost.content_preview.substr(0,200)+'...';
    }else{
        sizeClass = style.post_large;
        limitContentPreview = dataPost.content_preview.substr(0,450)+'...';
    }
    
    dataPost.content_preview = limitContentPreview;
    
    return(
        <div className={`${style.post} ${sizeClass}`}>
            <div>
                <img src={dataPost.cover_image_url}  
                    className={style.image_preview}/>
            </div>
            <div className={style.body_preview}>
                <p className={style.author}>
                    {dataPost.author}
                </p>
                <h2 className={style.title}>
                <Link href={`/Post/${dataPost.slug}`}>
                    <p>
                    {dataPost.title}
                    </p>
                    </Link>
                </h2>
                <p className={style.content}>
                    {dataPost.content_preview}
                </p>
                <div className={style.footer}>
                    <Link href={`/Post/${dataPost.slug}`}>
                    <a>
                        <img src="/More.png" className={style.more_icon}/>
                    </a>
                    </Link>
                </div>
            </div>
            </div>
    );
}