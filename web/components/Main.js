import Header from '../components/Header';

export default function Main({ children }) {
    return (
        <main>
            <Header />
            {children}
        </main>
    );
}