import axios from 'axios';
import { useState, useEffect } from 'react';
import { useNavigate, useParams } from 'react-router-dom';
import Message from '../../components/messages/Message';
import Loading from '../../components/loading/Loading';

function EditProduct() {
    const [data, setData] = useState([]);
    const [loading, setLoading] = useState(false);
    const [message, setMessage] = useState();
    const navigate = useNavigate();
    const { id } = useParams();

    useEffect(() => {

        setLoading(true);

        axios.get('http://localhost:8000/api/products/')
            .then(resp => {
                setData(resp.data);
            })
            .finally(() => setLoading(false));
    }, []);


    const handleEdit = (e) => {

        e.preventDefault();

        const data = new FormData(e.target);

        setLoading(true);

        axios.put('http://localhost:8000/api/products/' + id, data)
            .then(resp => {
                setMessage({ m: resp.data, s: 'success' });
                setTimeout(() => navigate('/admin'), 200);
            })
            .catch(error => {
                setMessage({ m: error.response.data, s: 'danger' })
            })
            .finally(() => setLoading(false));
    }

    return (
        <>
            <Loading show={loading} />

            <h1>Edit Product</h1>

            <Message message={message} />

            <form onSubmit={handleEdit}>

                {data.map(product => {
                    if (product.id === id) {
                        <>
                            <div className="mb-3">
                                <label className="form-label">Name</label>
                                <input type="text" name="name" className="form-control" value={product.name} required />
                            </div>
                            <div className="mb-3">
                                <label className="form-label">SKU</label>
                                <input type="text" name="sku" className="form-control" value={product.sku} required />
                            </div>
                            <div className="mb-3">
                                <label className="form-label">Photo</label>
                                <input type="text" name="photo" className="form-control" value={product.photo} required />
                            </div>
                            <div className="mb-3">
                                <label className="form-label">Warehouse quantity</label>
                                <input type="number" name="warehouse_qty" className="form-control" value={product.warehouse_qty} required />
                            </div>
                            <div className="mb-3">
                                <label className="form-label">Price</label>
                                <input type="number" step="0.01" name="price" className="form-control" value={product.price} required />
                            </div>
                        </>
                    }
                })}

                <button className="btn btn-primary">Edit</button>
            </form>
        </>
    );
}

export default EditProduct;
