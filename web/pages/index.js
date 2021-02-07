import React from 'react';
import Head from 'next/head';
import Header from '../components/Header';

export default function Home() {
    
    const [postsList, setPostsList] = React.useState([]);
    React.useEffect(async () => {
        await fetch(process.env.API_URL);
    }, []);
    
    return (
        <main>
            <Header />
        </main>
    );
}
