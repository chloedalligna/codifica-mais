<?php

namespace Chloe\PhpEstoque\Repository;

interface InterfaceRepository {

    public function listarProdutos();

    public function cadastrarProduto();

    public function editarProduto();

    public function excluirProduto();

    public function visualizarProduto();

}