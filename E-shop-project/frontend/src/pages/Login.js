import '../App.css';
import axios from 'axios';
import { useContext } from 'react';
import { useNavigate } from 'react-router-dom';
import MainContext from '../context/MainContext';

function Login() {

    const { setLoading, setMessage, setUser } = useContext(MainContext);

    const navigate = useNavigate();

    const handleSubmit = (e) => {
        e.preventDefault();

        const data = new FormData(e.target);

        setLoading(true);
        axios.post('http://localhost:8000/api/login', data)
            .then(resp => {
                setMessage({ m: resp.data.message, s: 'success' });

                setTimeout(() => {
                    setUser(true);

                    localStorage.setItem('token', resp.data.token);

                    axios.defaults.headers.common['Authorization'] = 'Bearer ' + resp.data.token;

                    navigate('/admin');
                }, 1000);
            })
            .catch(error => {
                setMessage({ m: error.response.data, s: 'danger' })
            })
            .finally(() => setLoading(false));
    }

    return (
        <div className='login-div'>
            <h1>Login</h1>
            <form onSubmit={handleSubmit}>
                <div className="mb-3">
                    <label className="form-label">E-mail</label>
                    <input type="email" name="email" className="form-control" required />
                </div>
                <div className="mb-3">
                    <label className="form-label">Password</label>
                    <input type="password" name="password" className="form-control" required />
                </div>

                <button className="btn btn-outline-dark">Login</button>
            </form>
        </div>
    );
}

export default Login;