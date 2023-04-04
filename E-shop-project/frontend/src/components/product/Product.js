import { useState } from 'react';
import { useNavigate } from 'react-router-dom';

function Product({ data }) {

    const [qty, setQty] = useState(1);
    const navigate = useNavigate();

    const handleSubmit = (e) => {
        e.preventDefault();

        return navigate('/' + data.id + '/' + qty);
    }

    return (
        <div className="card m-2 justify-content-center" key={data.id}>
            <div>
                <img src={data.photo} className="card-img-top py-3" alt={data.name} />
            </div>
            <div className="card-body">
                <h6>{data.name}</h6>
                <span>{data.price} €</span>
            </div>

            <form 
                className="py-2 input-group mb-2
                "
                onSubmit={handleSubmit}
                >
                <input 
                    type="number" 
                    value={qty} 
                    className="form-control"
                    onChange={(e) => setQty(e.target.value)} 
                />

                <button className="btn btn-primary">Order</button>
            </form>
        </div>
    );
}

export default Product;