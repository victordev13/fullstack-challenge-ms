import style from '../styles/Header.module.css';
import Link from 'next/link';

export default function Header() {
    return (
        <header className={style.menu}>
            <div className={style.left}>
                <p>Rockr Blog</p>
            </div>
            <nav>
                <ul className={style.navbar}>
                    <li>
                        <Link href="/">
                            <a>Posts</a>
                        </Link>
                    </li>
                    <li>Contact</li>
                </ul>
            </nav>
        </header>
    );
}
