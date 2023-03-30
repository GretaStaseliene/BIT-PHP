import { useContext, useEffect } from 'react';
import axios from 'axios';
import MainContext from '../context/MainContext';

function Products() {

  // const [data, setData] = useState([]);
  // const [refresh, setRefresh] = useState(false);

  const {setData, data, refresh, setLoading} = useContext(MainContext);

  useEffect(() => {
    setLoading(true);
    // Duomenu paemimas naudojant fetch funkcija
    // fetch('http://localhost:8000/api')
    // .then(resp =>resp.json())
    // .then(resp => {
    //   setData(resp);
    // });

    // Duomenu paemimas naudojant axios moduli
    axios.get('http://localhost:8000/api/products')
      .then(resp => setData(resp.data))
      .finally(() => setLoading(false));
  }, [refresh]);

  return (
    <>
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