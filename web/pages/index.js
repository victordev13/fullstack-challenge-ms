import React from 'react';
import Main from '../components/Main';
import PostPreview from '../components/PostPreview';

export default function Home() {
    
    /**
     * Variáveis de estado
     */
    const [postsList, setPostsList] = React.useState([]);
    const [showAlert, setShowAlert] = React.useState(false);

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
                setShowAlert(true);
                console.error(err);
            });
    }, []);

    return (
        <Main>
            <div className="posts">
            {postsList.length > 0 &&
                postsList.map((postItem, index) => {
                    if( index  % 2 == 1){
                        return <PostPreview dataPost={postItem} size="small" key={index}/>;
                    }else{
                        return <PostPreview dataPost={postItem} size="large" key={index}/>;
                    }
                })}
                {showAlert &&
                    <div className="aviso">
                        <p>Território limpo, nada aqui por enquanto!</p>
                    </div>
                }
            </div>
        </Main>
    );
}
