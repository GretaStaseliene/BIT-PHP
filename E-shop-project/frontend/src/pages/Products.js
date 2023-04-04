import { useContext, useEffect, useState } from 'react';
import axios from 'axios';
import MainContext from '../context/MainContext';
import Product from '../components/product/Product';

function Products() {

  const [sort, setSort] = useState('');
  const [direction, setDirection] = useState('');

  const { data, setData, refresh, setLoading } = useContext(MainContext);

  useEffect(() => {
    let url = 'http://localhost:8000/api/products/';

    if (sort != '' && direction != '') {
      url += sort + '/' + direction + '/';
    }

    setLoading(true);
    // Duomenu paemimas naudojant fetch funkcija
    // fetch('http://localhost:8000/api')
    // .then(resp =>resp.json())
    // .then(resp => {
    //   setData(resp);
    // });

    // Duomenu paemimas naudojant axios moduli
    axios.get(url)
      .then(resp => setData(resp.data))
      .finally(() => setLoading(false));
  }, [refresh, sort, direction]);

  return (
    <>
      <div className='d-flex justify-content-between align-items-center pb-3'>
        <h1>Our Newest Products</h1>
        <div className='sort d-flex gap-2 align-items-center'>
          <label>Filters:</label>

          <select className='form-control' onChange={(e) => setSort(e.target.value)}>
            <option>Filter by</option>
            <option value='name'>Title</option>
            <option value='price'>Price</option>
          </select>

          <select className='form-control' onChange={(e) => setDirection(e.target.value)}>
            <option>Order type</option>
            <option value='asc'>Ascending</option>
            <option value='desc'>Descending</option>
          </select>

        </div>
      </div>
      <div className='row'>
        {data.map(product =>
          <Product key={product.id} data={product} />
        )}
      </div>
    </>
  );
}

export default Products;