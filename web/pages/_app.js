import Head from 'next/head'
import '../styles/globals.css'

function MyApp({ Component, pageProps }) {
  return (
  <>
    <Head>
      <title>Rockr Blog</title>
      <link rel="preconnect" href="https://fonts.gstatic.com"/>
      <link href="https://fonts.googleapis.com/css2?family=Rubik:wght@400;500;700&display=swap" rel="stylesheet"/>
    </Head>
    <Component {...pageProps} />
  </>)
}

export default MyApp
