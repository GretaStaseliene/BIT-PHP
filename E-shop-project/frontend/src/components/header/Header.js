import { Link } from 'react-router-dom';
import axios from 'axios';
import { useState, useContext } from 'react';
import MainContext from '../../context/MainContext';

function Header() {
    const [search, setSearch] = useState('');

    // Grazinamas objektas
    const {setData, setRefresh} = useContext(MainContext);

    const handleSearch = (e) => {
        e.preventDefault();

        if(search === '') return setRefresh(exValue => !exValue);
        
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

                    <ul className="nav col-12 col-lg-auto me-lg-auto mb-2 justify-content-center mb-md-0">
                        <li><Link to="/admin" className="nav-link px-2 link-secondary">Admin</Link></li>
                        {/* <li><a href="#" className="nav-link px-2 link-dark">Inventory</a></li>
                        <li><a href="#" className="nav-link px-2 link-dark">Customers</a></li>
                        <li><a href="#" className="nav-link px-2 link-dark">Products</a></li> */}
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
                        {/* <a href="#" className="d-block link-dark text-decoration-none dropdown-toggle" data-bs-toggle="dropdown" aria-expanded="false">
                            <img src="https://github.com/mdo.png" alt="mdo" width="32" height="32" className="rounded-circle" />
                        </a> */}
                        <ul className="dropdown-menu text-small">
                            {/* <li><a className="dropdown-item" href="#">New project...</a></li>
                            <li><a className="dropdown-item" href="#">Settings</a></li>
                            <li><a className="dropdown-item" href="#">Profile</a></li>
                            <li><hr className="dropdown-divider" /></li>
                            <li><a className="dropdown-item" href="#">Sign out</a></li> */}
                        </ul>
                    </div>
                </div>
            </div>
        </header>
    );
}

export default Header;