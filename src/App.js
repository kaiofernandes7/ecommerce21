import React from 'react';
import 'bootstrap/dist/css/bootstrap.min.css';
import './styles.css';


const App = () => {
    return (
        <div>
            {/* Cabeçalho */}
            <header>
                <nav className="navbar navbar-expand-lg navbar-light bg-light">
                    <a className="navbar-brand" href="#">
                        <img src="https://via.placeholder.com/150x50?text=Logo" alt="Logo Loja Online" className="navbar-logo" />
                    </a>
                    <button className="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                        <span className="navbar-toggler-icon"></span>
                    </button>
                    <div className="collapse navbar-collapse" id="navbarNav">
                        <ul className="navbar-nav mr-auto">
                            <li className="nav-item active">
                                <a className="nav-link" href="#">Home <span className="sr-only">(current)</span></a>
                            </li>
                            <li className="nav-item">
                                <a className="nav-link" href="#">Carrinho</a>
                            </li>
                            <li className="nav-item">
                                <a className="nav-link" href="#">Contato</a>
                            </li>
                            <li className="nav-item">
                                <a className="nav-link" href="#">Sobre nós</a>
                            </li>
                            <li className="nav-item dropdown">
                                <a className="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                    Categorias
                                </a>
                                <div className="dropdown-menu" aria-labelledby="navbarDropdown">
                                    <a className="dropdown-item" href="#">Categoria 1</a>
                                    <a className="dropdown-item" href="#">Categoria 2</a>
                                    <a className="dropdown-item" href="#">Categoria 3</a>
                                    <a className="dropdown-item" href="#">Categoria 4</a>
                                </div>
                            </li>
                        </ul>
                        <form className="form-inline my-2 my-lg-0 ml-auto">
                            <input className="form-control mr-sm-2" type="search" placeholder="Buscar produtos" aria-label="Search" />
                            <button className="btn btn-outline-success my-2 my-sm-0" type="submit">Buscar</button>
                        </form>
                    </div>
                </nav>
            </header>

            {/* Banner Promocional */}
            <section className="banner mb-4">
                <div className="banner-content">
                    <h2>Super Promoção!</h2>
                    <p>Aproveite descontos incríveis em todos os produtos!</p>
                    <a href="#" className="btn btn-primary btn-lg">Confira Agora</a>
                </div>
            </section>

            {/* Conteúdo Principal */}
            <main className="container my-4">
                <div className="row">
                    {Array.from({ length: 6 }, (_, index) => (
                        <div className="col-md-4 mb-4" key={index}>
                            <div className="card">
                                <img src={`https://via.placeholder.com/300x300?text=Produto+${index + 1}`} className="card-img-top" alt={`Produto ${index + 1}`} />
                                <div className="card-body">
                                    <h5 className="card-title">Produto {index + 1}</h5>
                                    <p className="card-text">Descrição breve do produto {index + 1}.</p>
                                    <a href={`produto${index + 1}.html`} className="btn btn-primary">Comprar</a>
                                </div>
                            </div>
                        </div>
                    ))}
                </div>

                {/* Carrossel */}
                <div id="produtoCarrossel" className="carousel slide" data-ride="carousel">
                    <div className="carousel-inner">
                        <div className="carousel-item active">
                            <img src="https://via.placeholder.com/1200x400" className="d-block w-100" alt="Slide 1" />
                        </div>
                        <div className="carousel-item">
                            <img src="https://via.placeholder.com/1200x400" className="d-block w-100" alt="Slide 2" />
                        </div>
                        <div className="carousel-item">
                            <img src="https://via.placeholder.com/1200x400" className="d-block w-100" alt="Slide 3" />
                        </div>
                    </div>
                    <a className="carousel-control-prev" href="#produtoCarrossel" role="button" data-slide="prev">
                        <span className="carousel-control-prev-icon" aria-hidden="true"></span>
                        <span className="sr-only">Anterior</span>
                    </a>
                    <a className="carousel-control-next" href="#produtoCarrossel" role="button" data-slide="next">
                        <span className="carousel-control-next-icon" aria-hidden="true"></span>
                        <span className="sr-only">Próximo</span>
                    </a>
                </div>
            </main>

            {/* Rodapé */}
            <footer className="bg-light py-4">
                <div className="container text-center">
                    <div className="row">
                        <div className="col-md-4 mb-3">
                            <h5>Contato</h5>
                            <p><strong>Email:</strong> contato@lojaonline.com.br</p>
                            <p><strong>Telefone:</strong> (11) 1234-5678</p>
                        </div>
                        <div className="col-md-4 mb-3">
                            <h5>Redes Sociais</h5>
                            <a href="#" className="btn btn-outline-dark btn-sm"><i className="fab fa-facebook-f"></i> Facebook</a>
                            <a href="#" className="btn btn-outline-dark btn-sm"><i className="fab fa-twitter"></i> Twitter</a>
                            <a href="#" className="btn btn-outline-dark btn-sm"><i className="fab fa-instagram"></i> Instagram</a>
                            <a href="#" className="btn btn-outline-dark btn-sm"><i className="fab fa-youtube"></i> YouTube</a>
                        </div>
                        <div className="col-md-4 mb-3">
                            <h5>Links Rápidos</h5>
                            <a href="#" className="d-block">Home</a>
                            <a href="#" className="d-block">Contato</a>
                            <a href="#" className="d-block">FAQ</a>
                            <a href="#" className="d-block">Sobre Nós</a>
                        </div>
                    </div>
                    <p className="mb-0 mt-4">© 2024 Loja Online. Todos os direitos reservados.</p>
                </div>
            </footer>
        </div>
    );
}

export default App;
