import { useState, useEffect } from 'react';
import axios from 'axios';
import Header from '../components/header/Header';

function Products() {

  const [data, setData] = useState([]);

  useEffect(() => {
    // Duomenu paemimas naudojant fetch funkcija
    // fetch('http://localhost:8000/api')
    // .then(resp =>resp.json())
    // .then(resp => {
    //   setData(resp);
    // });

    // Duomenu paemimas naudojant axios moduli
    axios.get('http://localhost:8000/api/products')
      .then(resp => setData(resp.data));
  }, []);

  return (
    <>
      <Header setData={setData} />
      <h1>Naujausi produktai</h1>
      <div className='row'>
        {data.map(product =>
          <div className="card m-2 justify-content-center" key={product.id}>
            <div>
              <img src={product.photo} className="card-img-top py-3" alt={product.name} />
            </div>
            <div className="card-body">
              <h6>{product.name}</h6>
              <span>{product.price} €</span>
            </div>
          </div>
        )}
      </div>
    </>
  );
}

export default Products;