import React from 'react';
import Main from '../components/Main';
import PostPreview from '../components/PostPreview';

export default function Home() {
    
    /**
     * Variáveis de estado
     */
    const [postsList, setPostsList] = React.useState([]);

    /**
     * Executando requisições na primeira renderização
     */
    React.useEffect(async () => {
        console.log(process.env.NEXT_PUBLIC_API_URL);
        await fetch(`${process.env.NEXT_PUBLIC_API_URL}/posts`)
            .then((response) => response.json())
            .then((data) => {
                console.log(data);
                setPostsList(data.posts);
            })
            .catch((err) => {
                console.error(err);
            });
    }, []);

    return (
        <Main>
            {postsList.length > 0 &&
                postsList.map((postItem, index) => {

                    if(index % 2 == 1){
                        return <PostPreview dataPost={postItem} key={index}></PostPreview>;
                    }
                    return;
                })}
        </Main>
    );
}
