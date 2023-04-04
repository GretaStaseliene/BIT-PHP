import './Header.css';
import { Link } from 'react-router-dom';
import axios from 'axios';
import { useState, useContext, useEffect } from 'react';
import MainContext from '../../context/MainContext';

function Header() {
    const [search, setSearch] = useState('');
    const [show, setShow] = useState(false);
    const [categories, setCategories] = useState([]);

    // Grazinamas objektas
    const { setData, setRefresh } = useContext(MainContext);

    useEffect(() => {
        axios.get('http://localhost:8000/api/categories')
            .then(resp => setCategories(resp.data));
    }, []);

    const handleSearch = (e) => {
        e.preventDefault();

        if (search === '') return setRefresh(exValue => !exValue);

        axios.get('http://localhost:8000/api/products/s/' + search)
            .then(resp => setData(resp.data));
    }

    return (
        <header className='container'>
            <div className="p-3 mb-3 border-bottom">
                <div className="d-flex flex-wrap align-items-center justify-content-center justify-content-lg-start">
                    <Link to="/" className="d-flex align-items-center mb-2 mb-lg-0 text-dark text-decoration-none">
                        <h4>E-Shop</h4>
                    </Link>

                    {/* <div className="nav me-lg-auto mb-2 justify-content-center mb-md-0 w-25 ms-3">
                        <select className="form-select">
                            <option>Choose category</option>
                            {categories.map(el =>
                                <option key={el.id} value={el.name}>
                                    <Link to={'/category/' + el.id} className="nav-link px-2 link-secondary">{el.name}</Link>
                                </option>
                            )}
                        </select>
                    </div> */}

                    <ul className="nav col-12 col-lg-auto me-lg-auto mb-2 justify-content-center mb-md-0">
                        {categories.map(el =>
                            <li key={el.id}><Link to={'/category/' + el.id} className="nav-link px-2 link-dar">{el.name}</Link></li>
                        )}
                    </ul>

                    <form
                        className="col-12 col-lg-auto mb-3 mb-lg-0 me-lg-3 input-group w-25"
                        role="search"
                        onSubmit={handleSearch}
                    >
                        <input
                            type="search"
                            className="form-control"
                            placeholder="Search..."
                            aria-label="Search"
                            onKeyUp={(e) => setSearch(e.target.value)}
                        />
                        <button className='btn btn-primary'>Search</button>
                    </form>

                    <div className="dropdown text-end">
                        <div
                            className="d-block link-dark dropdown-toggle"
                            onClick={() => setShow(!show)}
                        >
                            <img src="https://github.com/mdo.png" alt="mdo" width="32" height="32" className="rounded-circle" />
                        </div>
                        {show &&
                            <ul className="dropdown-menu text-small show">
                                <li>
                                    <Link to="/admin" className="dropdown-item">Admin</Link>
                                </li>
                                <li>
                                    <Link to="admin/categories" className="dropdown-item">Categories</Link>
                                </li>
                                <li>
                                    <Link to="/admin/orders" className="dropdown-item">Orders</Link>
                                </li>
                                {/* <li><hr className="dropdown-divider" /></li>
                            <li><a className="dropdown-item" href="#">Sign out</a></li> */}
                            </ul>
                        }
                    </div>
                </div>
            </div>
        </header>
    );
}

export default Header;