* {
    box-sizing: border-box;
    margin: 0;
    padding: 0;
}


body {

    font-family: Arial, sans-serif;

    background: #f5f3ff;

    color: #333;

}


/* LOGIN */

.login-container {

    width: 400px;

    margin: 100px auto;

    background: white;

    padding: 40px;

    border-radius: 15px;

    box-shadow: 0 5px 20px rgba(0,0,0,0.15);

    text-align: center;

}


.login-container h1 {

    font-size: 35px;

    margin-bottom: 10px;

}


.login-container p {

    margin-bottom: 25px;

    color: #777;

}


.login-container h2 {

    margin-bottom: 20px;

}


.login-container label {

    display: block;

    text-align: left;

    margin-top: 15px;

    font-weight: bold;

}


.login-container input {

    width: 100%;

    padding: 12px;

    margin-top: 5px;

    border: 1px solid #ccc;

    border-radius: 8px;

}


button {

    width: 100%;

    padding: 12px;

    margin-top: 20px;

    border: none;

    border-radius: 8px;

    background: #7c3aed;

    color: white;

    font-size: 16px;

    cursor: pointer;

}


button:hover {

    background: #5b21b6;

}


/* HEADER */

.header {

    background: #7c3aed;

    color: white;

    padding: 20px 40px;

    display: flex;

    justify-content: space-between;

    align-items: center;

}


.header a {

    color: white;

    text-decoration: none;

    margin-left: 15px;

}


.logout {

    background: #ef4444;

    padding: 8px 12px;

    border-radius: 6px;

}


.cart {

    background: #2563eb;

    padding: 8px 12px;

    border-radius: 6px;

}


/* CATALOGO */

main {

    padding: 40px;

}


.titulo {

    text-align: center;

    margin-bottom: 30px;

}


.productos {

    display: grid;

    grid-template-columns: repeat(3, 1fr);

    gap: 25px;

}


.producto {

    background: white;

    padding: 20px;

    border-radius: 15px;

    text-align: center;

    box-shadow: 0 4px 12px rgba(0,0,0,0.1);

}


.producto img {

    width: 100%;

    height: 220px;

    object-fit: contain;

    margin-bottom: 15px;

}


.producto h3 {

    margin-bottom: 10px;

}


.precio {

    font-size: 22px;

    font-weight: bold;

    color: #7c3aed;

    margin: 10px 0;

}


/* DASHBOARD */

.dashboard {

    max-width: 1100px;

    margin: auto;

}


.cards {

    display: grid;

    grid-template-columns: repeat(3, 1fr);

    gap: 20px;

    margin: 30px 0;

}


.card {

    background: white;

    padding: 25px;

    border-radius: 12px;

    text-align: center;

    box-shadow: 0 3px 10px rgba(0,0,0,0.1);

}


.card p {

    font-size: 30px;

    font-weight: bold;

    margin-top: 10px;

}


.chart-container {

    background: white;

    padding: 30px;

    border-radius: 15px;

}


/* CARRITO */

.carrito {

    max-width: 900px;

    margin: auto;

}


table {

    width: 100%;

    border-collapse: collapse;

    margin-top: 25px;

    background: white;

}


th, td {

    padding: 15px;

    border-bottom: 1px solid #ddd;

    text-align: left;

}


th {

    background: #7c3aed;

    color: white;

}


.total {

    background: white;

    padding: 20px;

    margin-top: 20px;

    text-align: right;

    border-radius: 10px;

}


/* ERROR */

.error-container {

    width: 500px;

    margin: 150px auto;

    background: white;

    padding: 40px;

    text-align: center;

    border-radius: 15px;

    box-shadow: 0 5px 20px rgba(0,0,0,0.15);

}


.error-container h1 {

    color: #dc2626;

    margin-bottom: 20px;

}


.btn {

    display: inline-block;

    margin-top: 20px;

    padding: 12px 20px;

    background: #7c3aed;

    color: white;

    text-decoration: none;

    border-radius: 8px;

}