import './App.css';
import { useState } from 'react';

// React router dom'as
import { BrowserRouter, Routes, Route } from 'react-router-dom';

// Layout'as
import Main from './layouts/Main';

//Kontekstas
import MainContext from './context/MainContext';

// Puslapiai
import Products from './pages/Products';
import AdminProducts from './pages/admin/Products';
import NewProduct from './pages/admin/ProductsNew';
import EditProduct from './pages/admin/ProductsEdit';
import Categories from './pages/admin/Categories';
import NewCategory from './pages/admin/CategoriesNew';
import EditCategory from './pages/admin/CategoriesEdit';

function App() {
  const [data, setData] = useState([]);
  const [refresh, setRefresh] = useState(false);
  const [loading, setLoading] = useState(false);
  const [message, setMessage] = useState();

  const contextValues = {
    data,
    setData,
    refresh,
    setRefresh,
    loading,
    setLoading,
    message,
    setMessage
  };

  return (
    <>
      <BrowserRouter>
        {/* value propsas yra fiksuotas ir nekeiciamas pavadinimas */}
        <MainContext.Provider value={contextValues}>
          <Main>
            <Routes>
              <Route path='/' element={<Products />} />
              <Route path='/admin'>
                <Route index  element={<AdminProducts />} />
                <Route path='new-product' element={<NewProduct />} />
                <Route path='edit-product/:id' element={<EditProduct />} />
                <Route path='categories' element={<Categories />} />
                <Route path='new-category' element={<NewCategory />} />
                <Route path='edit-category/:id' element={<EditCategory />} />
              </Route>
            </Routes>
          </Main>
        </MainContext.Provider>
      </BrowserRouter>
    </>
  );
}

export default App;
