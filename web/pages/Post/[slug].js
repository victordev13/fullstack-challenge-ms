import React from 'react';
import {useRouter} from 'next/router'
export default function Post () {


    const router = useRouter();
    
    /**
     * Executando requisições na primeira renderização
     */
    React.useEffect(()=>{
        
    },[])
    return(
        <>
            Post {router.query.slug}
        </>
    )
}
