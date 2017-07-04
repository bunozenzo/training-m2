<?php
namespace Learn9\Module\Controller\Login;
use Magento\Customer\Api\AccountManagementInterface;
use Magento\Framework\Exception\EmailNotConfirmedException;
use Magento\Framework\Exception\InvalidEmailOrPasswordException;
/**
 * Login controller
 *
 * @method \Magento\Framework\App\RequestInterface getRequest()
 * @method \Magento\Framework\App\Response\Http getResponse()
 */
class Index extends \Magento\Framework\App\Action\Action
{
    /**
     * @var \Magento\Framework\Session\Generic
     */
    protected $session;
    /**
     * @var AccountManagementInterface
     */
    protected $customerAccountManagement;
    /**
     * @var \Magento\Framework\Json\Helper\Data $helper
     */
    protected $helper;
    /**
     * @var \Magento\Framework\Controller\Result\JsonFactory
     */
    protected $resultJsonFactory;
    /**
     * Initialize Login controller
     *
     * @param \Magento\Framework\App\Action\Context $context
     * @param \Magento\Customer\Model\Session $customerSession
     * @param \Magento\Framework\Json\Helper\Data $helper
     * @param AccountManagementInterface $customerAccountManagement
     * @param \Magento\Framework\Controller\Result\JsonFactory $resultJsonFactory
     * @param \Magento\Framework\Controller\Result\RawFactory $resultRawFactory
     */
    public function __construct(
        \Magento\Framework\App\Action\Context $context,
        \Magento\Customer\Model\Session $customerSession,
        \Magento\Framework\Json\Helper\Data $helper,
        AccountManagementInterface $customerAccountManagement,
        \Magento\Framework\Controller\Result\JsonFactory $resultJsonFactory
    ) {
        parent::__construct($context);
        $this->session = $customerSession;
        $this->helper = $helper;
        $this->customerAccountManagement = $customerAccountManagement;
        $this->resultJsonFactory = $resultJsonFactory;
    }
    /**
     * Login registered users and initiate a session.
     *
     * Expects a POST. ex for JSON {"username":"user@magento.com", "password":"userpassword"}
     *
     * @return \Magento\Framework\Controller\ResultInterface
     */
    public function execute()
    {
        $credentials = null;
        $httpBadRequestCode = 400;
        $credentials = $this->getRequest()->getParams();
        $response = [
            'errors' => false,
            'message' => __('Login successful.')
        ];
        try {
            $customer = $this->customerAccountManagement->authenticate(
                $credentials['username'],
                $credentials['password']
            );
            $this->session->setCustomerDataAsLoggedIn($customer);
            $this->session->regenerateId();
        } catch (EmailNotConfirmedException $e) {
            $response = [
                'errors' => true,
                'message' => $e->getMessage()
            ];
        } catch (InvalidEmailOrPasswordException $e) {
            $response = [
                'errors' => true,
                'message' => $e->getMessage()
            ];
        } catch (\Exception $e) {
            $response = [
                'errors' => true,
                'message' => __('Invalid login or password.')
            ];
        }
        /** @var \Magento\Framework\Controller\Result\Json $resultJson */
        $resultJson = $this->resultJsonFactory->create();
        return $resultJson->setData($response);
    }
}