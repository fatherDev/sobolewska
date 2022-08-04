import axios from 'axios';

import scroll from './locomotive';

const handleMorePosts = () => {
  const postsWrapperID = 'posts-wrapper';
  const loadMoreBtnID = 'load-more-btn';

  const postWrapper = document.getElementById(postsWrapperID);
  const loadMoreBtn = document.getElementById(loadMoreBtnID);

  if (postWrapper !== null) {
    // Get current page from wrapper data attribute
    let currentPage = postWrapper.dataset.page;

    // Get total pages count from wrapper data attribute
    const totalPages = postWrapper.dataset.totalPages;

    loadMoreBtn?.addEventListener('click', async () => {
      try {
        // Set params to connect with backend
        let params = new URLSearchParams();
        params.append('action', 'load_more_posts');
        params.append('current_page', currentPage);

        const {
          data: { data },
        } = await axios.post('/wp-admin/admin-ajax.php', params);
        postWrapper.dataset.page = ++currentPage;

        // Parse curent page and total pages numbers for reliable comparing
        const currentPageNum = parseInt(postWrapper.dataset.page, 10);
        const totalPagesNum = parseInt(totalPages, 10);

        // Add html of the newly loaded posts to the existing ones
        postWrapper.innerHTML += data;

        if (currentPageNum === totalPagesNum) {
          // Delete "Load more" button if all page are loaded
          loadMoreBtn.parentElement.removeChild(loadMoreBtn);
        }

        // Update scroller after modyfing DOM structre
        scroll?.update();
      } catch (err) {
        console.log(err);
      }
    });
  }
};

export default handleMorePosts;
