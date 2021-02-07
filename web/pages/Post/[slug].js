import React from 'react';
import {useRouter} from 'next/router'
import Main from '../../components/Main';
import style from '../../styles/Posts.module.css';
import SinglePost from '../../components/SinglePost';

export default function Post() {

    const [currentPost, setCurrentPost] = React.useState([]);
    const [message, setMessage] = React.useState('');
    const router = useRouter();
    
    /**
     * Executando requisições na primeira renderização
     */
    React.useEffect(() => {
        const slug = router.query.slug;
        fetch(`${process.env.NEXT_PUBLIC_API_URL}/posts/${slug}`)
            .then((response) => 
            {
                if(response.status === 404){
                    throw new Error('Post não encontrado!');
                }
                if(response.status !== 200){
                    throw new Error('Ocorreu um erro interno!');
                }
                return response.json();
            })
            .then((data) => {
                 console.log(data);
                setCurrentPost(data);
            })
            .catch((err) => {
                console.error(err.message);
                setMessage(err.message);
            });
    }, []);
        return(
        <Main>
            {currentPost.length > 0 &&
                <SinglePost data={currentPost[0]}/>
            }
            {message !== '' &&
                <div className="aviso">
                    {message}
                </div>
            }
        </Main>);
}
