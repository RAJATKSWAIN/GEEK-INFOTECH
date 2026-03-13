<?php
require_once __DIR__ . '/../core/config.php';

class FinanceService {
    private PDO $db;
    public function __construct() { $this->db = db(); }

    public function collectFee(array $data): bool {
        $this->db->beginTransaction();
        try {
            $this->db->prepare('INSERT INTO GIAMS_FEE_LEDGER (FEE_ID,RECEIPT_NO,PAYMENT_DATE,AMOUNT_PAID,PAYMENT_MODE,REMARKS,MAKER_ID) VALUES (:fee,:receipt,:date,:amount,:mode,:remarks,:maker)')
                ->execute([
                    ':fee' => $data['fee_id'], ':receipt' => $data['receipt_no'], ':date' => $data['payment_date'], ':amount' => $data['amount_paid'],
                    ':mode' => $data['payment_mode'], ':remarks' => $data['remarks'] ?? null, ':maker' => $data['maker_id'],
                ]);
            $this->db->prepare('UPDATE GIAMS_FEE_MASTER SET PAID_AMOUNT = PAID_AMOUNT + :amount WHERE FEE_ID = :fee')
                ->execute([':amount' => $data['amount_paid'], ':fee' => $data['fee_id']]);
            $this->db->commit();
            return true;
        } catch (Throwable $e) {
            $this->db->rollBack();
            throw $e;
        }
    }
}
