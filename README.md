# Control_Financial
Projeto de aplicação web para controle financeiro.

## Funcionalidades

- **Cadastro de novos usuários**
  - Formulário para criar uma nova conta de usuário.
  - Campos: Nome, Email, Senha, Confirmação de Senha.

- **Login de usuários**
  - Formulário para login de usuário.
  - Campos: Email, Senha.

- **Dashboard com resumo financeiro**
  - Visão geral das finanças pessoais.
  - Exibição de total de receitas, despesas e saldo atual.

- **Adição de transações (receitas/despesas)**
  - Formulário para adicionar uma nova transação.
  - Campos: Data, Descrição, Valor, Categoria (ex: Alimentação, Transporte, Lazer).

- **Listagem de transações**
  - Tabela para listar todas as transações.
  - Colunas: Data, Descrição, Valor, Categoria, Ações (Editar/Excluir).

- **Filtros para transações**
  - Filtros para visualizar transações por data, categoria, ou tipo (receita/despesa).

- **Gráficos de despesas e receitas**
  - Gráficos para visualizar a distribuição das despesas por categoria.
  - Gráficos de linha para mostrar a evolução do saldo ao longo do tempo.

## Funcionalidades Principais

1. **Relatórios Detalhados**

   - **Relatórios Personalizados:**
     - Exportação de relatórios em PDF ou Excel.
     - Opção de escolha do período: semanal, mensal ou anual.

   - **Resumo Anual:**
     - Visão consolidada das receitas e despesas ao longo do ano.

2. **Funcionalidades de Automação**

   - **Importação de Dados Bancários:**
     - Permitir a importação de extratos bancários nos formatos CSV ou OFX.

   - **Transações Recorrentes:**
     - Cadastro de transações recorrentes, como aluguel e assinaturas, com opções de periodicidade.

3. **Funcionalidades de Personalização**

   - **Temas Personalizáveis:**
     - Escolha entre temas claros e escuros para uma experiência personalizada.

   - **Configuração de Notificações:**
     - Permitir ao usuário definir notificações, como alertas para transações acima de um determinado valor (ex.: R$ 1.000).

4. **Planejamento Financeiro**

   - **Metas Financeiras:**
     - Permitir que o usuário defina metas financeiras, como economizar R$ 5.000 em 6 meses.
     - Monitorar o progresso dessas metas em tempo real.

   - **Orçamento Mensal:**
     - Configuração de orçamentos para categorias específicas (ex.: R$ 500 para alimentação).
     - Alertas emitidos quando o orçamento é excedido.

## Tecnologias Utilizadas

- HTML
- CSS
- Bootstrap
- JavaScript
- jQuery
- PHP (backend)
- PostgreSQL (banco de dados)
