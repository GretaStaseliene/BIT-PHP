import axios from 'axios';
import { useState, useEffect, useContext } from 'react';
import { useNavigate, useParams } from 'react-router-dom';
import MainContext from '../../context/MainContext';

function EditProduct() {
    const navigate = useNavigate();
    const { id } = useParams();
    const [data, setData] = useState({
        name: '',
        sku: '',
        photo: '',
        warehouse_qty: '',
        price: '',
        categories: []
    });
    const [categories, setCategories] = useState([]);

    const { setLoading, setMessage } = useContext(MainContext);

    useEffect(() => {

        setLoading(true);

        axios.get('http://localhost:8000/api/products/' + id)
            .then(resp => setData(resp.data))
            .finally(() => setLoading(false));

            axios.get('http://localhost:8000/api/categories')
            .then(resp => setCategories(resp.data));
    }, []);


    const handleEdit = (e) => {

        e.preventDefault();

        //const data = new FormData(e.target);

        setLoading(true);

        axios.put('http://localhost:8000/api/products/' + id, data)
            .then(resp => {
                setMessage({ m: resp.data, s: 'success' });
                setTimeout(() => navigate('/admin'), 1000);
            })
            .catch(error => {
                setMessage({ m: error.response.data, s: 'danger' })
            })
            .finally(() => setLoading(false));
    }

    const handleField = (e) => {

        if(e.target.name === 'categories') {

            if(e.target.checked) {
                data.categories.push(e.target.value);
            } else {
                const index = data.categories.indexOf(e.target.value);

                data.splice(index, 1);
            }
            
            return setData({...data});
        }

        setData({ ...data, [e.target.name]: e.target.value });

    }

    return (
        <>
            <h1>Edit Product</h1>

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
                <div className="mb-3">
                    <label className="form-label">SKU</label>
                    <input
                        type="text"
                        name="sku"
                        className="form-control"
                        value={data.sku}
                        onChange={handleField}
                        required
                    />
                </div>
                <div className="mb-3">
                    <label className="form-label">Photo</label>
                    <input
                        type="text"
                        name="photo"
                        className="form-control"
                        value={data.photo}
                        onChange={handleField}
                        required
                    />
                </div>
                <div className="mb-3">
                    <label className="form-label">Warehouse quantity</label>
                    <input
                        type="number"
                        name="warehouse_qty"
                        className="form-control"
                        value={data.warehouse_qty}
                        onChange={handleField}
                        required
                    />
                </div>
                <div className="mb-3">
                    <label className="form-label">Price</label>
                    <input
                        type="number"
                        step="0.01"
                        name="price"
                        className="form-control"
                        value={data.price}
                        onChange={handleField} required
                    />
                </div>
                <div className='mb-3'>
                    {categories.map(item =>
                        <div key={item.id}>
                        <label for="">
                            <input type='checkbox' name='categories' className='form-check-input me-2' value={item.id}
                            onChange={handleField}
                            checked={data.categories.find(el => el.id === item.id)} />
                            {item.name}
                            
                        </label>
                    </div>
                    )}
                </div>

                <button className="btn btn-primary">Edit</button>
            </form>
        </>
    );
}

export default EditProduct;
