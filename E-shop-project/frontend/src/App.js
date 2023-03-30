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
import NewProduct from './pages/admin/NewProduct';
import EditProduct from './pages/admin/EditProduct';

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
              <Route path='/admin' element={<AdminProducts />} />
              <Route path='/admin/new-product' element={<NewProduct />} />
              <Route path='/admin/edit-product/:id' element={<EditProduct />} />
            </Routes>
          </Main>
        </MainContext.Provider>
      </BrowserRouter>
    </>
  );
}

export default App;
