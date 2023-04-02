import axios from 'axios';
import { useState, useEffect, useContext } from 'react';
import { useNavigate, useParams } from 'react-router-dom';
import MainContext from '../../context/MainContext';

function EditCategory() {
    const navigate = useNavigate();
    const { id } = useParams();
    const [data, setData] = useState({
        name: '',
    });

    const { setLoading, setMessage } = useContext(MainContext);

    useEffect(() => {

        setLoading(true);

        axios.get('http://localhost:8000/api/categories/' + id)
            .then(resp => setData(resp.data))
            .finally(() => setLoading(false));
    }, []);


    const handleEdit = (e) => {

        e.preventDefault();

        //const data = new FormData(e.target);

        setLoading(true);

        axios.put('http://localhost:8000/api/categories/' + id, data)
            .then(resp => {
                setMessage({ m: resp.data, s: 'success' });
                setTimeout(() => navigate('/admin/categories'), 1000);
            })
            .catch(error => {
                setMessage({ m: error.response.data, s: 'danger' })
            })
            .finally(() => setLoading(false));
    }

    const handleField = (e) => {
        setData({ ...data, [e.target.name]: e.target.value });
    }

    return (
        <>
            <h1>Edit Category</h1>

            <form onSubmit={handleEdit}>
                <div className="mb-3">
                    <label className="form-label">Name</label>
                    <input
                        type="text"
                        name="name"
                        className="form-control"
                        value={data.name}
                        onChange={handleField}
                        required
                    />
                </div>

                <button className="btn btn-primary">Edit</button>
            </form>
        </>
    );
}

export default EditCategory;
