import React from 'react';
import {useRouter} from 'next/router'
import Main from '../../components/Main';
export default function Post () {


    const router = useRouter();
    
    /**
     * Executando requisições na primeira renderização
     */
    React.useEffect(()=>{
        
    },[])
    return <Main></Main>;
}
