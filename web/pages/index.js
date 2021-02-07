import React from 'react';
import Main from '../components/Main';

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
        await fetch(process.env.NEXT_PUBLIC_API_URL)
            .then((response) => {
                return response.json();
            })
            .then((data) => {
                return data;
            })
            .catch((err) => {
                console.error(err);
            });
    }, []);

    return <Main></Main>;
}
