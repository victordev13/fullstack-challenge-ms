import style from '../styles/Posts.module.css';

export default function SinglePost({data}){

    const months = ['jan', 'fev', 'mar', 'abr', 'mai', 'jun', 'jul', 'ago', 'set', 'out', 'nov', 'dez',]

    let createdDateFormated = new Date(data.created_at);
    createdDateFormated = `${months[createdDateFormated.getMonth()+1]} ${createdDateFormated.getDate()}, ${createdDateFormated.getFullYear()}`;

    // data.content = data.content.replace('\n','<br><br>')
    return(
        <div className={style.post_container}>
            <div className={style.post_header}>
                <img src={data.cover_image_url}/>
                <div className={style.post_info}>
                    <h1 className={style.title}>{data.title}</h1>
                    <p>{createdDateFormated}</p>
                    <p>{data.author}</p>
                </div>
            </div>
            <div className={style.post_body}>
                <p>{data.content}</p>
            </div>
        </div>
    )
}