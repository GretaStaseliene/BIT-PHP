import { Link } from 'react-router-dom';

function Footer() {
    return (
        <footer className="d-flex flex-wrap justify-content-between align-items-center py-3 my-4 border-top container">
            <div className="col-md-4 d-flex align-items-center">
                <Link to="/" className="mb-3 me-2 mb-md-0 text-muted text-decoration-none lh-1">
                    <span className="mb-3 mb-md-0 text-muted">&copy; Made by Greta Stašelienė</span>
                </Link>
            </div>

            <ul className="nav col-md-4 justify-content-end list-unstyled d-flex">
                <li className="ms-3"><a className="text-muted" href="https://twitter.com">Twitter</a></li>
                <li className="ms-3"><a className="text-muted" href="https://instagram.com">Instagram</a></li>
                <li className="ms-3"><a className="text-muted" href="https://facebook.com">Facebook</a></li>
            </ul>
        </footer>
    );
}

export default Footer;