import style from '../styles/Header.module.css';
import Link from 'next/link';

export default function Header() {
    return (
        <header className={style.header}>
                <div className={style.menu}>
                    <div className={style.left}>
                        <p>Rockr Blog</p>
                    </div>
                    <nav>
                        <ul className={style.navbar}>
                                <Link href="/">
                            <li>
                                    <a>Posts</a>
                            </li>
                                </Link>
                                <Link href="/Contact">
                            <li>
                                    <a>Contact</a>
                            </li>
                                </Link>
                        </ul>
                    </nav>
            </div>
        </header>
    );
}
