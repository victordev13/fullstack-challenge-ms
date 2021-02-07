import React from 'react';
import {useRouter} from 'next/router'
import Main from '../../components/Main';
import style from '../../styles/Posts.module.css';

export default function Post () {

    const [currentPost, setCurrentPost] = React.useState([]);
    const router = useRouter();
    
    /**
     * Executando requisições na primeira renderização
     */
    React.useEffect(async () => {
        await fetch(`${process.env.NEXT_PUBLIC_API_URL}/posts/${router.query.slug}`)
            .then((response) => response.json())
            .then((data) => {
                console.log(data);
                setCurrentPost(data);
            })
            .catch((err) => {
                console.error(err);
            });
    }, []);
    return     (<Main>
        
    </Main>);
}
